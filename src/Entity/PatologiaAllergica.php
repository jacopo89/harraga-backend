<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatologiaAllergicaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PatologiaAllergicaRepository::class)
 */
class PatologiaAllergica
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
    private $patologia;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Sanitaria::class, inversedBy="patologiaAllergicas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sanitaria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatologia(): ?string
    {
        return $this->patologia;
    }

    public function setPatologia(?string $patologia): self
    {
        $this->patologia = $patologia;

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
