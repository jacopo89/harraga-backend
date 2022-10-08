<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PolizzaAssicurativaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PolizzaAssicurativaRepository::class)
 */
class PolizzaAssicurativa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"anagrafica"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $tipologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $dataInizio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $dataFine;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $allegato;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

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

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(?Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }
}
