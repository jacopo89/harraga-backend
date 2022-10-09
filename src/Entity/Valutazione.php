<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValutazioneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ValutazioneRepository::class)
 */
class Valutazione
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"istruzione"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $valutazione;

    /**
     * @ORM\ManyToOne(targetEntity=PercorsoIstruzioneFormazioneItalia::class, inversedBy="valutaziones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $percorsoIstruzioneFormazione;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValutazione(): ?Allegato
    {
        return $this->valutazione;
    }

    public function setValutazione(?Allegato $valutazione): self
    {
        $this->valutazione = $valutazione;

        return $this;
    }

    public function getPercorsoIstruzioneFormazione(): ?PercorsoIstruzioneFormazioneItalia
    {
        return $this->percorsoIstruzioneFormazione;
    }

    public function setPercorsoIstruzioneFormazione(?PercorsoIstruzioneFormazioneItalia $percorsoIstruzioneFormazione): self
    {
        $this->percorsoIstruzioneFormazione = $percorsoIstruzioneFormazione;

        return $this;
    }
}
