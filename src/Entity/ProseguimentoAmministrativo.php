<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProseguimentoAmministrativoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProseguimentoAmministrativoRepository::class)
 */
class ProseguimentoAmministrativo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataAttribuzione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataFinale;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"amministrativa"})
     */
    private $note;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAttribuzione(): ?string
    {
        return $this->dataAttribuzione;
    }

    public function setDataAttribuzione(?string $dataAttribuzione): self
    {
        $this->dataAttribuzione = $dataAttribuzione;

        return $this;
    }

    public function getDataFinale(): ?string
    {
        return $this->dataFinale;
    }

    public function setDataFinale(?string $dataFinale): self
    {
        $this->dataFinale = $dataFinale;

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
