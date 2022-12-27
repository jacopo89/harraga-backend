<?php

namespace App\Controller;

use App\DTO\CSVImporterController\CSVUploadDTO;
use App\Entity\CartellaSociale;
use App\Repository\CartellaSocialeRepository;
use FileHandler\Bundle\FileHandlerBundle\Model\UploadedBase64File;
use FileHandler\Bundle\FileHandlerBundle\Service\Base64Uploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use League\Csv\Reader;

class CSVImporterController extends AbstractController
{
    const HEADER_NOME = "Nome";
    const HEADER_COGNOME = "Cognome";
    const HEADER_EMAIL = "Email";
    const HEADER_DATA_NASCITA = "DataNascita";
    const NUMERO_TUTELA = "NumeroTutela";

    private Base64Uploader $base64Uploader;
    private NormalizerInterface $serializer;
    private CartellaSocialeRepository $cartellaSocialeRepository;
    public function __construct(Base64Uploader $base64Uploader, SerializerInterface $serializer, CartellaSocialeRepository $cartellaSocialeRepository)
    {
        $this->serializer = $serializer;
        $this->base64Uploader = $base64Uploader;
        $this->cartellaSocialeRepository = $cartellaSocialeRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/upload_csv")
     */
    public function getCSV(Request $request){

        /**
         * @var CSVUploadDTO $csvUploadDTO
         */
        $csvUploadDTO = $this->serializer->deserialize($request->getContent(), CSVUploadDTO::class,"json");
        $fileToUpload = $this->base64Uploader->fromBase64File($csvUploadDTO->csvFile);

        $csv = Reader::createFromString($fileToUpload->getContent());
        $csv->setHeaderOffset(0);
        $header = $csv->getHeader();

        $isHeaderGood = $this->checkHeader($header);
        if($isHeaderGood){

            $errorMessages = [];
            $records = $csv->getRecords();

            foreach ($records as $record){


                $cartella = new CartellaSociale();
                $anagrafica = $cartella->getAnagrafica();
                $anagrafica->setCartellaSociale($cartella);

                $isDataParsed = $this->parseData($record[self::HEADER_DATA_NASCITA]);
                if($isDataParsed) {
                    $anagrafica->setDataNascitaCorretta($isDataParsed);
                    $anagrafica->setNome($record[self::HEADER_NOME]);
                    $anagrafica->setCognome($record[self::HEADER_COGNOME]);
                    $anagrafica->setEmail($record[self::HEADER_EMAIL]);
                    $anagrafica->setNumeroTutela($record[self::NUMERO_TUTELA]);

                    try{
                        $this->cartellaSocialeRepository->persist($cartella);
                    }catch(\Exception $e) {
                        $errorMessages[]= $e->getMessage();
                    }
                }else{
                    $errorMessages[] = sprintf("L'anagrafica di %s %s non ha la data di nascita nel formato corretto", $record[self::HEADER_NOME], $record[self::HEADER_COGNOME]);
                }

            }
            if(sizeof($errorMessages) === 0) {
                $this->cartellaSocialeRepository->flush();
                return new JsonResponse();
            }

            return new JsonResponse($errorMessages, ReSponse::HTTP_BAD_REQUEST);
        }
        $errorMessages[] = "Errore nell'Header";

        return new JsonResponse($errorMessages,  Response::HTTP_BAD_REQUEST );




    }

    private function checkHeader($header){
        if(!isset($header[0]) || $header[0] !== self::HEADER_NOME) return false;
        if(!isset($header[1]) || $header[1] !== self::HEADER_COGNOME) return false;
        if(!isset($header[2]) || $header[2] !== self::HEADER_EMAIL) return false;
        if(!isset($header[3]) || $header[3] !== self::HEADER_DATA_NASCITA) return false;
        if(!isset($header[4]) || $header[4] !== self::NUMERO_TUTELA) return false;
        return true;
    }

    private function parseData($dataNascita){
        if($dataNascita===null) return $dataNascita;
        $data = \DateTime::createFromFormat("d/m/Y",$dataNascita);
        if($data) return $data;
        $data = \DateTime::createFromFormat("Y-m-d",$dataNascita);
        if($data) return $data;

        return false;
    }
}
