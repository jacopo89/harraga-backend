<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProceduraPenaleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProceduraPenaleRepository::class)
 */
class ProceduraPenale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statoProcedimento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomeAssistenteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cognomeAssistenteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailAssistenteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefonoAssistenteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $peiDescrizione;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     */
    private $peiAllegato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatoProcedimento(): ?string
    {
        return $this->statoProcedimento;
    }

    public function setStatoProcedimento(?string $statoProcedimento): self
    {
        $this->statoProcedimento = $statoProcedimento;

        return $this;
    }

    public function getNomeAssistenteSociale(): ?string
    {
        return $this->nomeAssistenteSociale;
    }

    public function setNomeAssistenteSociale(?string $nomeAssistenteSociale): self
    {
        $this->nomeAssistenteSociale = $nomeAssistenteSociale;

        return $this;
    }

    public function getCognomeAssistenteSociale(): ?string
    {
        return $this->cognomeAssistenteSociale;
    }

    public function setCognomeAssistenteSociale(?string $cognomeAssistenteSociale): self
    {
        $this->cognomeAssistenteSociale = $cognomeAssistenteSociale;

        return $this;
    }

    public function getEmailAssistenteSociale(): ?string
    {
        return $this->emailAssistenteSociale;
    }

    public function setEmailAssistenteSociale(?string $emailAssistenteSociale): self
    {
        $this->emailAssistenteSociale = $emailAssistenteSociale;

        return $this;
    }

    public function getTelefonoAssistenteSociale(): ?string
    {
        return $this->telefonoAssistenteSociale;
    }

    public function setTelefonoAssistenteSociale(?string $telefonoAssistenteSociale): self
    {
        $this->telefonoAssistenteSociale = $telefonoAssistenteSociale;

        return $this;
    }

    public function getPeiDescrizione(): ?string
    {
        return $this->peiDescrizione;
    }

    public function setPeiDescrizione(?string $peiDescrizione): self
    {
        $this->peiDescrizione = $peiDescrizione;

        return $this;
    }

    public function getPeiAllegato(): ?Allegato
    {
        return $this->peiAllegato;
    }

    public function setPeiAllegato(?Allegato $peiAllegato): self
    {
        $this->peiAllegato = $peiAllegato;

        return $this;
    }
}
