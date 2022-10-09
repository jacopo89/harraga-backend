<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VisitaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VisitaRepository::class)
 */
class Visita
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"sanitaria"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $presidioOspedaliero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $UO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $nomeMedico;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $cognomeMedico;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $emailMedico;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"sanitaria"})
     */
    private $telefonoMedico;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Sanitaria::class, inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sanitaria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getPresidioOspedaliero(): ?string
    {
        return $this->presidioOspedaliero;
    }

    public function setPresidioOspedaliero(?string $presidioOspedaliero): self
    {
        $this->presidioOspedaliero = $presidioOspedaliero;

        return $this;
    }

    public function getUO(): ?string
    {
        return $this->UO;
    }

    public function setUO(?string $UO): self
    {
        $this->UO = $UO;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getNomeMedico(): ?string
    {
        return $this->nomeMedico;
    }

    public function setNomeMedico(?string $nomeMedico): self
    {
        $this->nomeMedico = $nomeMedico;

        return $this;
    }

    public function getCognomeMedico(): ?string
    {
        return $this->cognomeMedico;
    }

    public function setCognomeMedico(?string $cognomeMedico): self
    {
        $this->cognomeMedico = $cognomeMedico;

        return $this;
    }

    public function getEmailMedico(): ?string
    {
        return $this->emailMedico;
    }

    public function setEmailMedico(?string $emailMedico): self
    {
        $this->emailMedico = $emailMedico;

        return $this;
    }

    public function getTelefonoMedico(): ?string
    {
        return $this->telefonoMedico;
    }

    public function setTelefonoMedico(?string $telefonoMedico): self
    {
        $this->telefonoMedico = $telefonoMedico;

        return $this;
    }

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(?Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }

    public function getSanitaria(): ?Sanitaria
    {
        return $this->sanitaria;
    }

    public function setSanitaria(?Sanitaria $sanitaria): self
    {
        $this->sanitaria = $sanitaria;

        return $this;
    }
}
