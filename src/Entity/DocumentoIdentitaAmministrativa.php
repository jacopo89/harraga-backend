<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DocumentoIdentitaAmministrativaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DocumentoIdentitaAmministrativaRepository::class)
 */
class DocumentoIdentitaAmministrativa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Amministrativa::class, inversedBy="documentoIdentitaAmministrativas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $amministrativa;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAmministrativa(): ?Amministrativa
    {
        return $this->amministrativa;
    }

    public function setAmministrativa(?Amministrativa $amministrativa): self
    {
        $this->amministrativa = $amministrativa;

        return $this;
    }
}
