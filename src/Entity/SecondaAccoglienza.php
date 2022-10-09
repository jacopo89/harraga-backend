<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SecondaAccoglienzaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SecondaAccoglienzaRepository::class)
 */
class SecondaAccoglienza
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"storia"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $secondaAccoglienza;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $tipologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $nomeResponsabile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $cognomeResponsabile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $emailResponsabile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $telefonoResponsabile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $dataIngresso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $dataUscita;

    /**
     * @ORM\OneToOne(targetEntity=Storia::class, inversedBy="secondaAccoglienza", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecondaAccoglienza(): ?string
    {
        return $this->secondaAccoglienza;
    }

    public function setSecondaAccoglienza(?string $secondaAccoglienza): self
    {
        $this->secondaAccoglienza = $secondaAccoglienza;

        return $this;
    }

    public function getTipologia(): ?string
    {
        return $this->tipologia;
    }

    public function setTipologia(?string $tipologia): self
    {
        $this->tipologia = $tipologia;

        return $this;
    }

    public function getNomeResponsabile(): ?string
    {
        return $this->nomeResponsabile;
    }

    public function setNomeResponsabile(?string $nomeResponsabile): self
    {
        $this->nomeResponsabile = $nomeResponsabile;

        return $this;
    }

    public function getCognomeResponsabile(): ?string
    {
        return $this->cognomeResponsabile;
    }

    public function setCognomeResponsabile(?string $cognomeResponsabile): self
    {
        $this->cognomeResponsabile = $cognomeResponsabile;

        return $this;
    }

    public function getEmailResponsabile(): ?string
    {
        return $this->emailResponsabile;
    }

    public function setEmailResponsabile(?string $emailResponsabile): self
    {
        $this->emailResponsabile = $emailResponsabile;

        return $this;
    }

    public function getTelefonoResponsabile(): ?string
    {
        return $this->telefonoResponsabile;
    }

    public function setTelefonoResponsabile(?string $telefonoResponsabile): self
    {
        $this->telefonoResponsabile = $telefonoResponsabile;

        return $this;
    }

    public function getDataIngresso(): ?string
    {
        return $this->dataIngresso;
    }

    public function setDataIngresso(?string $dataIngresso): self
    {
        $this->dataIngresso = $dataIngresso;

        return $this;
    }

    public function getDataUscita(): ?string
    {
        return $this->dataUscita;
    }

    public function setDataUscita(?string $dataUscita): self
    {
        $this->dataUscita = $dataUscita;

        return $this;
    }

    public function getStoria(): ?Storia
    {
        return $this->storia;
    }

    public function setStoria(Storia $storia): self
    {
        $this->storia = $storia;

        return $this;
    }
}
