<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IstruzioneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"istruzione"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"istruzione"}},
 * )
 * @ORM\Entity(repositoryClass=IstruzioneRepository::class)
 */
class Istruzione
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"istruzione"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="istruzione", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=PercorsoIstruzioneOrigine::class, mappedBy="istruzione", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $percorsoIstruzioneOrigines;

    /**
     * @ORM\OneToMany(targetEntity=PercorsoIstruzioneItaliaConcluso::class, mappedBy="istruzione", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $percorsoIstruzioneItaliaConclusos;

    /**
     * @ORM\OneToMany(targetEntity=PercorsoIstruzioneFormazioneItalia::class, mappedBy="istruzione", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $percorsoIstruzioneFormazioneItalias;

    public function __construct()
    {
        $this->percorsoIstruzioneOrigines = new ArrayCollection();
        $this->percorsoIstruzioneItaliaConclusos = new ArrayCollection();
        $this->percorsoIstruzioneFormazioneItalias = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Istruzione
    {
        $istruzione = new self();
        $istruzione->setCartellaSociale($cartellaSociale);
        return $istruzione;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartellaSociale(): ?CartellaSociale
    {
        return $this->cartellaSociale;
    }

    public function setCartellaSociale(CartellaSociale $cartellaSociale): self
    {
        $this->cartellaSociale = $cartellaSociale;

        return $this;
    }

    /**
     * @return Collection<int, PercorsoIstruzioneOrigine>
     */
    public function getPercorsoIstruzioneOrigines(): Collection
    {
        return $this->percorsoIstruzioneOrigines;
    }

    public function addPercorsoIstruzioneOrigine(PercorsoIstruzioneOrigine $percorsoIstruzioneOrigine): self
    {
        if (!$this->percorsoIstruzioneOrigines->contains($percorsoIstruzioneOrigine)) {
            $this->percorsoIstruzioneOrigines[] = $percorsoIstruzioneOrigine;
            $percorsoIstruzioneOrigine->setIstruzione($this);
        }

        return $this;
    }

    public function removePercorsoIstruzioneOrigine(PercorsoIstruzioneOrigine $percorsoIstruzioneOrigine): self
    {
        if ($this->percorsoIstruzioneOrigines->removeElement($percorsoIstruzioneOrigine)) {
            // set the owning side to null (unless already changed)
            if ($percorsoIstruzioneOrigine->getIstruzione() === $this) {
                $percorsoIstruzioneOrigine->setIstruzione(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PercorsoIstruzioneItaliaConcluso>
     */
    public function getPercorsoIstruzioneItaliaConclusos(): Collection
    {
        return $this->percorsoIstruzioneItaliaConclusos;
    }

    public function addPercorsoIstruzioneItaliaConcluso(PercorsoIstruzioneItaliaConcluso $percorsoIstruzioneItaliaConcluso): self
    {
        if (!$this->percorsoIstruzioneItaliaConclusos->contains($percorsoIstruzioneItaliaConcluso)) {
            $this->percorsoIstruzioneItaliaConclusos[] = $percorsoIstruzioneItaliaConcluso;
            $percorsoIstruzioneItaliaConcluso->setIstruzione($this);
        }

        return $this;
    }

    public function removePercorsoIstruzioneItaliaConcluso(PercorsoIstruzioneItaliaConcluso $percorsoIstruzioneItaliaConcluso): self
    {
        if ($this->percorsoIstruzioneItaliaConclusos->removeElement($percorsoIstruzioneItaliaConcluso)) {
            // set the owning side to null (unless already changed)
            if ($percorsoIstruzioneItaliaConcluso->getIstruzione() === $this) {
                $percorsoIstruzioneItaliaConcluso->setIstruzione(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PercorsoIstruzioneFormazioneItalia>
     */
    public function getPercorsoIstruzioneFormazioneItalias(): Collection
    {
        return $this->percorsoIstruzioneFormazioneItalias;
    }

    public function addPercorsoIstruzioneFormazioneItalias(PercorsoIstruzioneFormazioneItalia $percorsoIstruzioneFormazioneItalias): self
    {
        if (!$this->percorsoIstruzioneFormazioneItalias->contains($percorsoIstruzioneFormazioneItalias)) {
            $this->percorsoIstruzioneFormazioneItalias[] = $percorsoIstruzioneFormazioneItalias;
            $percorsoIstruzioneFormazioneItalias->setIstruzione($this);
        }

        return $this;
    }

    public function removePercorsoIstruzioneFormazioneItalias(PercorsoIstruzioneFormazioneItalia $percorsoIstruzioneFormazioneItalias): self
    {
        if ($this->percorsoIstruzioneFormazioneItalias->removeElement($percorsoIstruzioneFormazioneItalias)) {
            // set the owning side to null (unless already changed)
            if ($percorsoIstruzioneFormazioneItalias->getIstruzione() === $this) {
                $percorsoIstruzioneFormazioneItalias->setIstruzione(null);
            }
        }

        return $this;
    }
}
