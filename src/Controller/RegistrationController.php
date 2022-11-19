<?php

namespace App\Controller;

use App\DTO\RegistrationController\RegistrationDTO;
use App\Service\Registration\RegistrationService;
use App\Utilities\ViolationResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private RegistrationService $registrationService;

    public function __construct(SerializerInterface $serializer,ValidatorInterface $validator,RegistrationService $registrationService)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->registrationService = $registrationService;
    }

    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     *
     * Metodo di registrazione di un utente dal form di registrazione.
     */
    public function register(Request $request)
    {
        /**
         * @var RegistrationDTO $registration
         */
        $registration = $this->serializer->deserialize($request->getContent(),RegistrationDTO::class, 'json');
        $errors = $this->validator->validate($registration);
        if(count($errors)> 0){
            return ViolationResponse::createFromViolationList($errors);
        }

        try{
            $utente = $this->registrationService->register($registration);
        }catch(\Exception $iamException){
            $constraintViolation = new ConstraintViolation("La email inserita è già registrata",null,[],$registration->email, "email", $registration->email);
            return ViolationResponse::createFromSingleViolation($constraintViolation);
        }

        return new JsonResponse();
    }
}
