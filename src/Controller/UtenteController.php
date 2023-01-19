<?php

namespace App\Controller;

use App\DTO\UtenteController\CambiaPasswordDTO;
use App\Entity\Utente;
use App\Repository\UtenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UtenteController extends AbstractController
{
    private SerializerInterface $serializer;
    private UtenteRepository $utenteRepository;
    private UserPasswordHasherInterface $userPasswordHasher;
    public function __construct(SerializerInterface $serializer, UtenteRepository $utenteRepository, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->serializer= $serializer;
        $this->utenteRepository = $utenteRepository;
        $this->userPasswordHasher= $userPasswordHasher;
    }

    /**
     * @param Utente $utente
     * @param Request $request
     * @return Response
     * @Route ("/api/utentes/{id}/cambia_password")
     */
    public function cambiaPassword(Utente $utente,Request $request){
        /**
         * @var CambiaPasswordDTO $dto
         */
        $dto = $this->serializer->deserialize($request->getContent(), CambiaPasswordDTO::class, "json");
        $hashedPassword = $this->userPasswordHasher->hashPassword($utente,$dto->password);
        $utente->setPassword($hashedPassword);
        $this->utenteRepository->save($utente);

        return new Response();
    }
}
