<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProceduraLegaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProceduraLegaleRepository::class)
 */
class ProceduraLegale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=RegolamentoDublino::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $regolamentoDublino;

    /**
     * @ORM\OneToMany(targetEntity=Appuntamento::class, mappedBy="proceduraLegale", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"amministrativa"})
     */
    private $appuntamenti;

    /**
     * @ORM\OneToMany(targetEntity=RicorsoAmministrativo::class, mappedBy="proceduraLegale", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"amministrativa"})
     */
    private $ricorsiAmministrativi;

    /**
     * @ORM\ManyToOne(targetEntity=Amministrativa::class, inversedBy="proceduraLegales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $amministrativa;

    public function __construct()
    {
        $this->appuntamenti = new ArrayCollection();
        $this->ricorsiAmministrativi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegolamentoDublino(): ?RegolamentoDublino
    {
        return $this->regolamentoDublino;
    }

    public function setRegolamentoDublino(?RegolamentoDublino $regolamentoDublino): self
    {
        $this->regolamentoDublino = $regolamentoDublino;

        return $this;
    }

    /**
     * @return Collection<int, Appuntamento>
     */
    public function getAppuntamenti(): Collection
    {
        return $this->appuntamenti;
    }

    public function addAPpuntamenti(Appuntamento $appuntamenti): self
    {
        if (!$this->appuntamenti->contains($appuntamenti)) {
            $this->appuntamenti[] = $appuntamenti;
            $appuntamenti->setProceduraLegale($this);
        }

        return $this;
    }

    public function removeAPpuntamenti(Appuntamento $appuntamenti): self
    {
        if ($this->appuntamenti->removeElement($appuntamenti)) {
            // set the owning side to null (unless already changed)
            if ($appuntamenti->getProceduraLegale() === $this) {
                $appuntamenti->setProceduraLegale(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RicorsoAmministrativo>
     */
    public function getRicorsiAmministrativi(): Collection
    {
        return $this->ricorsiAmministrativi;
    }

    public function addRicorsiAmministrativi(RicorsoAmministrativo $ricorsiAmministrativi): self
    {
        if (!$this->ricorsiAmministrativi->contains($ricorsiAmministrativi)) {
            $this->ricorsiAmministrativi[] = $ricorsiAmministrativi;
            $ricorsiAmministrativi->setProceduraLegale($this);
        }

        return $this;
    }

    public function removeRicorsiAmministrativi(RicorsoAmministrativo $ricorsiAmministrativi): self
    {
        if ($this->ricorsiAmministrativi->removeElement($ricorsiAmministrativi)) {
            // set the owning side to null (unless already changed)
            if ($ricorsiAmministrativi->getProceduraLegale() === $this) {
                $ricorsiAmministrativi->setProceduraLegale(null);
            }
        }

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
