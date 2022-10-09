<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EsperienzaLavorativaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EsperienzaLavorativaRepository::class)
 */
class EsperienzaLavorativa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"lavoro"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $stato;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $tipologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $ambitiLavorativi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $inquadramentoLavorativo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $dataInizio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $dataFine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $nomeAzienda;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $luogoAzienda;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $emailAzienda;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"lavoro"})
     */
    private $telefonoAzienda;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"lavoro"})
     */
    private $competenzeAcquisite;

    /**
     * @ORM\ManyToOne(targetEntity=Lavoro::class, inversedBy="esperienzaLavorativas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lavoro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStato(): ?string
    {
        return $this->stato;
    }

    public function setStato(?string $stato): self
    {
        $this->stato = $stato;

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

    public function getAmbitiLavorativi(): ?string
    {
        return $this->ambitiLavorativi;
    }

    public function setAmbitiLavorativi(?string $ambitiLavorativi): self
    {
        $this->ambitiLavorativi = $ambitiLavorativi;

        return $this;
    }

    public function getInquadramentoLavorativo(): ?string
    {
        return $this->inquadramentoLavorativo;
    }

    public function setInquadramentoLavorativo(?string $inquadramentoLavorativo): self
    {
        $this->inquadramentoLavorativo = $inquadramentoLavorativo;

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

    public function getNomeAzienda(): ?string
    {
        return $this->nomeAzienda;
    }

    public function setNomeAzienda(?string $nomeAzienda): self
    {
        $this->nomeAzienda = $nomeAzienda;

        return $this;
    }

    public function getLuogoAzienda(): ?string
    {
        return $this->luogoAzienda;
    }

    public function setLuogoAzienda(?string $luogoAzienda): self
    {
        $this->luogoAzienda = $luogoAzienda;

        return $this;
    }

    public function getEmailAzienda(): ?string
    {
        return $this->emailAzienda;
    }

    public function setEmailAzienda(?string $emailAzienda): self
    {
        $this->emailAzienda = $emailAzienda;

        return $this;
    }

    public function getTelefonoAzienda(): ?string
    {
        return $this->telefonoAzienda;
    }

    public function setTelefonoAzienda(?string $telefonoAzienda): self
    {
        $this->telefonoAzienda = $telefonoAzienda;

        return $this;
    }

    public function getCompetenzeAcquisite(): ?string
    {
        return $this->competenzeAcquisite;
    }

    public function setCompetenzeAcquisite(?string $competenzeAcquisite): self
    {
        $this->competenzeAcquisite = $competenzeAcquisite;

        return $this;
    }

    public function getLavoro(): ?Lavoro
    {
        return $this->lavoro;
    }

    public function setLavoro(?Lavoro $lavoro): self
    {
        $this->lavoro = $lavoro;

        return $this;
    }
}
