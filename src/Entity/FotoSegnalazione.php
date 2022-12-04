<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FotoSegnalazioneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FotoSegnalazioneRepository::class)
 */
class FotoSegnalazione
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
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $ufficioCompetente;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getUfficioCompetente(): ?string
    {
        return $this->ufficioCompetente;
    }

    public function setUfficioCompetente(?string $ufficioCompetente): self
    {
        $this->ufficioCompetente = $ufficioCompetente;

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
