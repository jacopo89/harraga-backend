<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SanitariaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"sanitaria"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"sanitaria"}},
 * )
 * @ORM\Entity(repositoryClass=SanitariaRepository::class)
 */
class Sanitaria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"sanitaria"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="sanitaria", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=SpecificaDisabilita::class, mappedBy="sanitaria", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $specificaDisabilitas;

    /**
     * @ORM\OneToMany(targetEntity=PatologiaAllergica::class, mappedBy="sanitaria", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $patologiaAllergicas;

    /**
     * @ORM\OneToOne(targetEntity=MedicoCurante::class, mappedBy="sanitaria", cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $medicoCurante;

    /**
     * @ORM\OneToOne(targetEntity=PresoInCarico::class, mappedBy="sanitaria", cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $presoInCarico;

    /**
     * @ORM\OneToMany(targetEntity=Vaccino::class, mappedBy="sanitaria", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $vaccinos;

    /**
     * @ORM\OneToMany(targetEntity=Visita::class, mappedBy="sanitaria", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"sanitaria"})
     */
    private $visitas;

    public function __construct()
    {
        $this->specificaDisabilitas = new ArrayCollection();
        $this->patologiaAllergicas = new ArrayCollection();
        $this->vaccinos = new ArrayCollection();
        $this->visitas = new ArrayCollection();
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
     * @return Collection<int, SpecificaDisabilita>
     */
    public function getSpecificaDisabilitas(): Collection
    {
        return $this->specificaDisabilitas;
    }

    public function addSpecificaDisabilita(SpecificaDisabilita $specificaDisabilita): self
    {
        if (!$this->specificaDisabilitas->contains($specificaDisabilita)) {
            $this->specificaDisabilitas[] = $specificaDisabilita;
            $specificaDisabilita->setSanitaria($this);
        }

        return $this;
    }

    public function removeSpecificaDisabilita(SpecificaDisabilita $specificaDisabilita): self
    {
        if ($this->specificaDisabilitas->removeElement($specificaDisabilita)) {
            // set the owning side to null (unless already changed)
            if ($specificaDisabilita->getSanitaria() === $this) {
                $specificaDisabilita->setSanitaria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PatologiaAllergica>
     */
    public function getPatologiaAllergicas(): Collection
    {
        return $this->patologiaAllergicas;
    }

    public function addPatologiaAllergica(PatologiaAllergica $patologiaAllergica): self
    {
        if (!$this->patologiaAllergicas->contains($patologiaAllergica)) {
            $this->patologiaAllergicas[] = $patologiaAllergica;
            $patologiaAllergica->setSanitaria($this);
        }

        return $this;
    }

    public function removePatologiaAllergica(PatologiaAllergica $patologiaAllergica): self
    {
        if ($this->patologiaAllergicas->removeElement($patologiaAllergica)) {
            // set the owning side to null (unless already changed)
            if ($patologiaAllergica->getSanitaria() === $this) {
                $patologiaAllergica->setSanitaria(null);
            }
        }

        return $this;
    }

    public function getMedicoCurante(): ?MedicoCurante
    {
        return $this->medicoCurante;
    }

    public function setMedicoCurante(MedicoCurante $medicoCurante): self
    {
        // set the owning side of the relation if necessary
        if ($medicoCurante->getSanitaria() !== $this) {
            $medicoCurante->setSanitaria($this);
        }

        $this->medicoCurante = $medicoCurante;

        return $this;
    }

    public function getPresoInCarico(): ?PresoInCarico
    {
        return $this->presoInCarico;
    }

    public function setPresoInCarico(PresoInCarico $presoInCarico): self
    {
        // set the owning side of the relation if necessary
        if ($presoInCarico->getSanitaria() !== $this) {
            $presoInCarico->setSanitaria($this);
        }

        $this->presoInCarico = $presoInCarico;

        return $this;
    }

    /**
     * @return Collection<int, Vaccino>
     */
    public function getVaccinos(): Collection
    {
        return $this->vaccinos;
    }

    public function addVaccino(Vaccino $vaccino): self
    {
        if (!$this->vaccinos->contains($vaccino)) {
            $this->vaccinos[] = $vaccino;
            $vaccino->setSanitaria($this);
        }

        return $this;
    }

    public function removeVaccino(Vaccino $vaccino): self
    {
        if ($this->vaccinos->removeElement($vaccino)) {
            // set the owning side to null (unless already changed)
            if ($vaccino->getSanitaria() === $this) {
                $vaccino->setSanitaria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Visita>
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visita $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setSanitaria($this);
        }

        return $this;
    }

    public function removeVisita(Visita $visita): self
    {
        if ($this->visitas->removeElement($visita)) {
            // set the owning side to null (unless already changed)
            if ($visita->getSanitaria() === $this) {
                $visita->setSanitaria(null);
            }
        }

        return $this;
    }
}
