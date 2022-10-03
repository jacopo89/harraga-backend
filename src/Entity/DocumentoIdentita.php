<?php

namespace App\Entity;

use App\Repository\DocumentoIdentitaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
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
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"cartella","anagrafica"})
     */
    private $allegato;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }
}
