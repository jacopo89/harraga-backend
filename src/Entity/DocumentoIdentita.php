<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DocumentoIdentitaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource ()
 * @ORM\Entity(repositoryClass=DocumentoIdentitaRepository::class)
 */
class DocumentoIdentita
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"cartella","anagrafica"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anagrafica::class, inversedBy="documentoIdentitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anagrafica;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $descrizione;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $allegato;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(?Anagrafica $anagrafica): self
    {
        $this->anagrafica = $anagrafica;

        return $this;
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
}
