<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PercorsoIstruzioneFormazioneItaliaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PercorsoIstruzioneFormazioneItaliaRepository::class)
 */
class PercorsoIstruzioneFormazioneItalia
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
    private $tipologia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $indirizzoStudi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $dataInizio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $dataFinePrevista;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $istituto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"istruzione"})
     */
    private $luogo;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"istruzione"})
     */
    private $orariGiorni;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $progettoFormativo;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $pattoFormativo;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $bilancioCompetenze;

    /**
     * @ORM\OneToMany(targetEntity=Valutazione::class, mappedBy="percorsoIstruzioneFormazione", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"istruzione"})
     */
    private $valutaziones;

    /**
     * @ORM\ManyToOne(targetEntity=Istruzione::class, inversedBy="percorsoIstruzioneFormazioneItalias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $istruzione;

    public function __construct()
    {
        $this->valutaziones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIndirizzoStudi(): ?string
    {
        return $this->indirizzoStudi;
    }

    public function setIndirizzoStudi(?string $indirizzoStudi): self
    {
        $this->indirizzoStudi = $indirizzoStudi;

        return $this;
    }

    public function getDataInizio(): ?string
    {
        return $this->dataInizio;
    }

    public function setDataInizio(?string $dataInizio): self
    {
        $this->dataInizio = $dataInizio;

        return $this;
    }

    public function getDataFinePrevista(): ?string
    {
        return $this->dataFinePrevista;
    }

    public function setDataFinePrevista(?string $dataFinePrevista): self
    {
        $this->dataFinePrevista = $dataFinePrevista;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getIstituto(): ?string
    {
        return $this->istituto;
    }

    public function setIstituto(?string $istituto): self
    {
        $this->istituto = $istituto;

        return $this;
    }

    public function getLuogo(): ?string
    {
        return $this->luogo;
    }

    public function setLuogo(?string $luogo): self
    {
        $this->luogo = $luogo;

        return $this;
    }

    public function getOrariGiorni(): ?string
    {
        return $this->orariGiorni;
    }

    public function setOrariGiorni(?string $orariGiorni): self
    {
        $this->orariGiorni = $orariGiorni;

        return $this;
    }

    public function getProgettoFormativo(): ?Allegato
    {
        return $this->progettoFormativo;
    }

    public function setProgettoFormativo(?Allegato $progettoFormativo): self
    {
        $this->progettoFormativo = $progettoFormativo;

        return $this;
    }

    public function getPattoFormativo(): ?Allegato
    {
        return $this->pattoFormativo;
    }

    public function setPattoFormativo(?Allegato $pattoFormativo): self
    {
        $this->pattoFormativo = $pattoFormativo;

        return $this;
    }

    public function getBilancioCompetenze(): ?Allegato
    {
        return $this->bilancioCompetenze;
    }

    public function setBilancioCompetenze(?Allegato $bilancioCompetenze): self
    {
        $this->bilancioCompetenze = $bilancioCompetenze;

        return $this;
    }

    /**
     * @return Collection<int, Valutazione>
     */
    public function getValutaziones(): Collection
    {
        return $this->valutaziones;
    }

    public function addValutazione(Valutazione $valutazione): self
    {
        if (!$this->valutaziones->contains($valutazione)) {
            $this->valutaziones[] = $valutazione;
            $valutazione->setPercorsoIstruzioneFormazione($this);
        }

        return $this;
    }

    public function removeValutazione(Valutazione $valutazione): self
    {
        if ($this->valutaziones->removeElement($valutazione)) {
            // set the owning side to null (unless already changed)
            if ($valutazione->getPercorsoIstruzioneFormazione() === $this) {
                $valutazione->setPercorsoIstruzioneFormazione(null);
            }
        }

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
