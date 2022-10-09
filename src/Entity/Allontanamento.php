<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AllontanamentoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AllontanamentoRepository::class)
 */
class Allontanamento
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
    private $tipologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $luogo;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $comunicazione;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Storia::class, inversedBy="allontanamentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getLuogo(): ?string
    {
        return $this->luogo;
    }

    public function setLuogo(?string $luogo): self
    {
        $this->luogo = $luogo;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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
