<?php

namespace App\Factory;

use App\DTO\RegistrationController\RegistrationDTO;
use App\Entity\Utente;

class UtenteFactory
{
    public static function creaUtente(RegistrationDTO $registrationDTO){
        $utente= new Utente();
        $utente->setNome($registrationDTO->nome);
        $utente->setCognome($registrationDTO->cognome);
        $utente->setEmail($registrationDTO->email);
        $utente->setTelefono($registrationDTO->telefono);
        $utente->setRoles([$registrationDTO->ruolo]);
        return $utente;
    }

}
