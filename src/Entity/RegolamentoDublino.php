<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RegolamentoDublinoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RegolamentoDublinoRepository::class)
 */
class RegolamentoDublino
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $paeseOrigine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $paeseArrivo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $statoProcedura;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaeseOrigine(): ?string
    {
        return $this->paeseOrigine;
    }

    public function setPaeseOrigine(?string $paeseOrigine): self
    {
        $this->paeseOrigine = $paeseOrigine;

        return $this;
    }

    public function getPaeseArrivo(): ?string
    {
        return $this->paeseArrivo;
    }

    public function setPaeseArrivo(?string $paeseArrivo): self
    {
        $this->paeseArrivo = $paeseArrivo;

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

    public function getStatoProcedura(): ?string
    {
        return $this->statoProcedura;
    }

    public function setStatoProcedura(?string $statoProcedura): self
    {
        $this->statoProcedura = $statoProcedura;

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
