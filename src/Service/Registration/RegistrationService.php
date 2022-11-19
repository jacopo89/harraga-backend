<?php

namespace App\Service\Registration;

use App\DTO\RegistrationController\RegistrationDTO;
use App\Factory\UtenteFactory;
use App\Repository\UtenteRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationService
{
    private UserPasswordHasherInterface $userPasswordHasher;
    private UtenteRepository $utenteRepository;
    public function __construct(UserPasswordHasherInterface $userPasswordHasher,UtenteRepository $utenteRepository)
    {
        $this->userPasswordHasher =$userPasswordHasher;
        $this->utenteRepository = $utenteRepository;
    }

    public function register(RegistrationDTO $registrationDTO){
        $utente = UtenteFactory::creaUtente($registrationDTO);
        $hashedPassword = $this->userPasswordHasher->hashPassword($utente,$registrationDTO->password);
        $utente->setPassword($hashedPassword);
        $this->utenteRepository->save($utente);

        return $utente;
    }
}
