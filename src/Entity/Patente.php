<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatenteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PatenteRepository::class)
 */
class Patente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competenze"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"competenze"})
     */
    private $descrizione;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Competenze::class, inversedBy="patentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competenze;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(?string $descrizione): self
    {
        $this->descrizione = $descrizione;

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

    public function getCompetenze(): ?Competenze
    {
        return $this->competenze;
    }

    public function setCompetenze(?Competenze $competenze): self
    {
        $this->competenze = $competenze;

        return $this;
    }
}
