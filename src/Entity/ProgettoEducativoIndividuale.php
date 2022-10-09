<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProgettoEducativoIndividualeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProgettoEducativoIndividualeRepository::class)
 */
class ProgettoEducativoIndividuale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"storia"})
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $descrizione;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $comunicazione;

    /**
     * @ORM\ManyToOne(targetEntity=Storia::class, inversedBy="progettoEducativoIndividuales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

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

    public function getComunicazione(): ?Allegato
    {
        return $this->comunicazione;
    }

    public function setComunicazione(?Allegato $comunicazione): self
    {
        $this->comunicazione = $comunicazione;

        return $this;
    }

    public function getStoria(): ?Storia
    {
        return $this->storia;
    }

    public function setStoria(?Storia $storia): self
    {
        $this->storia = $storia;

        return $this;
    }
}
