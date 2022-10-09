<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HotspotRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=HotspotRepository::class)
 */
class Hotspot
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
    private $nome;

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
     * @ORM\OneToOne(targetEntity=Storia::class, inversedBy="hotspot", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

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
