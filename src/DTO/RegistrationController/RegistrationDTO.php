<?php

namespace App\DTO\RegistrationController;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationDTO
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $nome;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $cognome;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $email;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $telefono;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $ruolo;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $password;
}
