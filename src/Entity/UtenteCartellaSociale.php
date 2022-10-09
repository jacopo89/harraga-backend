<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UtenteCartellaSocialeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UtenteCartellaSocialeRepository::class)
 */
class UtenteCartellaSociale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utente::class, inversedBy="utenteCartellaSociales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utente;

    /**
     * @ORM\ManyToOne(targetEntity=CartellaSociale::class, inversedBy="utenteCartellaSociales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruolo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtente(): ?Utente
    {
        return $this->utente;
    }

    public function setUtente(?Utente $utente): self
    {
        $this->utente = $utente;

        return $this;
    }

    public function getCartellaSociale(): ?CartellaSociale
    {
        return $this->cartellaSociale;
    }

    public function setCartellaSociale(?CartellaSociale $cartellaSociale): self
    {
        $this->cartellaSociale = $cartellaSociale;

        return $this;
    }

    public function getRuolo(): ?string
    {
        return $this->ruolo;
    }

    public function setRuolo(string $ruolo): self
    {
        $this->ruolo = $ruolo;

        return $this;
    }
}
