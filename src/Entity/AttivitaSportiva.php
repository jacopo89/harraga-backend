<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AttivitaSportivaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AttivitaSportivaRepository::class)
 */
class AttivitaSportiva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"socialita"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $pregressa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $dataInizio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $dataFine;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"socialita"})
     */
    private $certificazione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $nomeReferente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $cognomeReferente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $emailReferente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"socialita"})
     */
    private $telefonoReferente;

    /**
     * @ORM\ManyToOne(targetEntity=Socialita::class, inversedBy="attivitaSportivas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $socialita;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPregressa(): ?string
    {
        return $this->pregressa;
    }

    public function setPregressa(?string $pregressa): self
    {
        $this->pregressa = $pregressa;

        return $this;
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

    public function getDataInizio(): ?string
    {
        return $this->dataInizio;
    }

    public function setDataInizio(?string $dataInizio): self
    {
        $this->dataInizio = $dataInizio;

        return $this;
    }

    public function getDataFine(): ?string
    {
        return $this->dataFine;
    }

    public function setDataFine(?string $dataFine): self
    {
        $this->dataFine = $dataFine;

        return $this;
    }

    public function getCertificazione(): ?Allegato
    {
        return $this->certificazione;
    }

    public function setCertificazione(?Allegato $certificazione): self
    {
        $this->certificazione = $certificazione;

        return $this;
    }

    public function getNomeReferente(): ?string
    {
        return $this->nomeReferente;
    }

    public function setNomeReferente(?string $nomeReferente): self
    {
        $this->nomeReferente = $nomeReferente;

        return $this;
    }

    public function getCognomeReferente(): ?string
    {
        return $this->cognomeReferente;
    }

    public function setCognomeReferente(?string $cognomeReferente): self
    {
        $this->cognomeReferente = $cognomeReferente;

        return $this;
    }

    public function getEmailReferente(): ?string
    {
        return $this->emailReferente;
    }

    public function setEmailReferente(?string $emailReferente): self
    {
        $this->emailReferente = $emailReferente;

        return $this;
    }

    public function getTelefonoReferente(): ?string
    {
        return $this->telefonoReferente;
    }

    public function setTelefonoReferente(?string $telefonoReferente): self
    {
        $this->telefonoReferente = $telefonoReferente;

        return $this;
    }

    public function getSocialita(): ?Socialita
    {
        return $this->socialita;
    }

    public function setSocialita(?Socialita $socialita): self
    {
        $this->socialita = $socialita;

        return $this;
    }
}
