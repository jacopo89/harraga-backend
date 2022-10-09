<?php

namespace App\Entity;

use App\Repository\RevocaTutelaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RevocaTutelaRepository::class)
 */
class RevocaTutela
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
    private $motivazione;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;

    /**
     * @ORM\OneToOne(targetEntity=Amministrativa::class, inversedBy="revocaTutela", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $amministrativa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotivazione(): ?string
    {
        return $this->motivazione;
    }

    public function setMotivazione(?string $motivazione): self
    {
        $this->motivazione = $motivazione;

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

    public function getAmministrativa(): ?Amministrativa
    {
        return $this->amministrativa;
    }

    public function setAmministrativa(Amministrativa $amministrativa): self
    {
        $this->amministrativa = $amministrativa;

        return $this;
    }
}
