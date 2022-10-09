<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VaccinoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VaccinoRepository::class)
 */
class Vaccino
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
    private $vaccino;

    /**
     * @ORM\ManyToOne(targetEntity=Sanitaria::class, inversedBy="vaccinos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sanitaria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaccino(): ?string
    {
        return $this->vaccino;
    }

    public function setVaccino(?string $vaccino): self
    {
        $this->vaccino = $vaccino;

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
