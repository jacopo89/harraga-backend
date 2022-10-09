<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SpecificaDisabilitaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SpecificaDisabilitaRepository::class)
 */
class SpecificaDisabilita
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
    private $disabilita;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Sanitaria::class, inversedBy="specificaDisabilitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sanitaria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisabilita(): ?string
    {
        return $this->disabilita;
    }

    public function setDisabilita(?string $disabilita): self
    {
        $this->disabilita = $disabilita;

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
