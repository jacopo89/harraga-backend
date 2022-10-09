<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PercorsoIstruzioneOrigineRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PercorsoIstruzioneOrigineRepository::class)
 */
class PercorsoIstruzioneOrigine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"istruzione"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $saLeggere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $saScrivere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $tipologia;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Istruzione::class, inversedBy="percorsoIstruzioneOrigines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $istruzione;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaLeggere(): ?string
    {
        return $this->saLeggere;
    }

    public function setSaLeggere(?string $saLeggere): self
    {
        $this->saLeggere = $saLeggere;

        return $this;
    }

    public function getSaScrivere(): ?string
    {
        return $this->saScrivere;
    }

    public function setSaScrivere(?string $saScrivere): self
    {
        $this->saScrivere = $saScrivere;

        return $this;
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

    public function getIstruzione(): ?Istruzione
    {
        return $this->istruzione;
    }

    public function setIstruzione(?Istruzione $istruzione): self
    {
        $this->istruzione = $istruzione;

        return $this;
    }
}
