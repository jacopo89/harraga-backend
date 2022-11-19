<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetenzeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"competenze"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"competenze"}},
 * )
 * @ORM\Entity(repositoryClass=CompetenzeRepository::class)
 */
class Competenze
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competenze"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="competenze", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=LinguaDichiarata::class, mappedBy="competenze", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $linguaDichiaratas;

    /**
     * @ORM\OneToMany(targetEntity=LinguaAttestata::class, mappedBy="competenze", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $linguaAttestatas;

    /**
     * @ORM\OneToMany(targetEntity=LinguaCertificata::class, mappedBy="competenze", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $linguaCertificatas;

    /**
     * @ORM\OneToMany(targetEntity=CompetenzaDigitale::class, mappedBy="competenze", orphanRemoval=true,  cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $competenzaDigitales;

    /**
     * @ORM\OneToMany(targetEntity=AltraCompetenza::class, mappedBy="competenze", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $altraCompetenzas;

    /**
     * @ORM\OneToMany(targetEntity=Patente::class, mappedBy="competenze", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $patentes;

    public function __construct()
    {
        $this->linguaDichiaratas = new ArrayCollection();
        $this->linguaAttestatas = new ArrayCollection();
        $this->linguaCertificatas = new ArrayCollection();
        $this->competenzaDigitales = new ArrayCollection();
        $this->altraCompetenzas = new ArrayCollection();
        $this->patentes = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Competenze
    {
        $competenze = new self();
        $competenze->setCartellaSociale($cartellaSociale);
        return $competenze;
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
     * @return Collection<int, LinguaDichiarata>
     */
    public function getLinguaDichiaratas(): Collection
    {
        return $this->linguaDichiaratas;
    }

    public function addLinguaDichiarata(LinguaDichiarata $linguaDichiarata): self
    {
        if (!$this->linguaDichiaratas->contains($linguaDichiarata)) {
            $this->linguaDichiaratas[] = $linguaDichiarata;
            $linguaDichiarata->setCompetenze($this);
        }

        return $this;
    }

    public function removeLinguaDichiarata(LinguaDichiarata $linguaDichiarata): self
    {
        if ($this->linguaDichiaratas->removeElement($linguaDichiarata)) {
            // set the owning side to null (unless already changed)
            if ($linguaDichiarata->getCompetenze() === $this) {
                $linguaDichiarata->setCompetenze(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LinguaAttestata>
     */
    public function getLinguaAttestatas(): Collection
    {
        return $this->linguaAttestatas;
    }

    public function addLinguaAttestata(LinguaAttestata $linguaAttestata): self
    {
        if (!$this->linguaAttestatas->contains($linguaAttestata)) {
            $this->linguaAttestatas[] = $linguaAttestata;
            $linguaAttestata->setCompetenze($this);
        }

        return $this;
    }

    public function removeLinguaAttestata(LinguaAttestata $linguaAttestata): self
    {
        if ($this->linguaAttestatas->removeElement($linguaAttestata)) {
            // set the owning side to null (unless already changed)
            if ($linguaAttestata->getCompetenze() === $this) {
                $linguaAttestata->setCompetenze(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LinguaCertificata>
     */
    public function getLinguaCertificatas(): Collection
    {
        return $this->linguaCertificatas;
    }

    public function addLinguaCertificata(LinguaCertificata $linguaCertificata): self
    {
        if (!$this->linguaCertificatas->contains($linguaCertificata)) {
            $this->linguaCertificatas[] = $linguaCertificata;
            $linguaCertificata->setCompetenze($this);
        }

        return $this;
    }

    public function removeLinguaCertificata(LinguaCertificata $linguaCertificata): self
    {
        if ($this->linguaCertificatas->removeElement($linguaCertificata)) {
            // set the owning side to null (unless already changed)
            if ($linguaCertificata->getCompetenze() === $this) {
                $linguaCertificata->setCompetenze(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompetenzaDigitale>
     */
    public function getCompetenzaDigitales(): Collection
    {
        return $this->competenzaDigitales;
    }

    public function addCompetenzaDigitale(CompetenzaDigitale $competenzaDigitale): self
    {
        if (!$this->competenzaDigitales->contains($competenzaDigitale)) {
            $this->competenzaDigitales[] = $competenzaDigitale;
            $competenzaDigitale->setCompetenze($this);
        }

        return $this;
    }

    public function removeCompetenzaDigitale(CompetenzaDigitale $competenzaDigitale): self
    {
        if ($this->competenzaDigitales->removeElement($competenzaDigitale)) {
            // set the owning side to null (unless already changed)
            if ($competenzaDigitale->getCompetenze() === $this) {
                $competenzaDigitale->setCompetenze(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AltraCompetenza>
     */
    public function getAltraCompetenzas(): Collection
    {
        return $this->altraCompetenzas;
    }

    public function addAltraCompetenza(AltraCompetenza $altraCompetenza): self
    {
        if (!$this->altraCompetenzas->contains($altraCompetenza)) {
            $this->altraCompetenzas[] = $altraCompetenza;
            $altraCompetenza->setCompetenze($this);
        }

        return $this;
    }

    public function removeAltraCompetenza(AltraCompetenza $altraCompetenza): self
    {
        if ($this->altraCompetenzas->removeElement($altraCompetenza)) {
            // set the owning side to null (unless already changed)
            if ($altraCompetenza->getCompetenze() === $this) {
                $altraCompetenza->setCompetenze(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Patente>
     */
    public function getPatentes(): Collection
    {
        return $this->patentes;
    }

    public function addPatente(Patente $patente): self
    {
        if (!$this->patentes->contains($patente)) {
            $this->patentes[] = $patente;
            $patente->setCompetenze($this);
        }

        return $this;
    }

    public function removePatente(Patente $patente): self
    {
        if ($this->patentes->removeElement($patente)) {
            // set the owning side to null (unless already changed)
            if ($patente->getCompetenze() === $this) {
                $patente->setCompetenze(null);
            }
        }

        return $this;
    }
}
