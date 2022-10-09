<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PermessoSoggiornoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PermessoSoggiornoRepository::class)
 */
class PermessoSoggiorno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"amministrativa"})
     */
    private $stato;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataRichiesta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataRilascio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $rilasciatoDa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataScadenza;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $tipologia;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Amministrativa::class, inversedBy="permessoSoggiornos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $amministrativa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStato(): ?string
    {
        return $this->stato;
    }

    public function setStato(string $stato): self
    {
        $this->stato = $stato;

        return $this;
    }

    public function getDataRichiesta(): ?string
    {
        return $this->dataRichiesta;
    }

    public function setDataRichiesta(?string $dataRichiesta): self
    {
        $this->dataRichiesta = $dataRichiesta;

        return $this;
    }

    public function getDataRilascio(): ?string
    {
        return $this->dataRilascio;
    }

    public function setDataRilascio(?string $dataRilascio): self
    {
        $this->dataRilascio = $dataRilascio;

        return $this;
    }

    public function getRilasciatoDa(): ?string
    {
        return $this->rilasciatoDa;
    }

    public function setRilasciatoDa(?string $rilasciatoDa): self
    {
        $this->rilasciatoDa = $rilasciatoDa;

        return $this;
    }

    public function getDataScadenza(): ?string
    {
        return $this->dataScadenza;
    }

    public function setDataScadenza(?string $dataScadenza): self
    {
        $this->dataScadenza = $dataScadenza;

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

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(?Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }

    public function getAmministrativa(): ?Amministrativa
    {
        return $this->amministrativa;
    }

    public function setAmministrativa(?Amministrativa $amministrativa): self
    {
        $this->amministrativa = $amministrativa;

        return $this;
    }
}
