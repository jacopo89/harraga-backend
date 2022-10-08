<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DocumentiPossessoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DocumentiPossessoRepository::class)
 */
class DocumentiPossesso
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
