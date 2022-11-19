<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"storia"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"storia"}},
 * )
 * @ORM\Entity(repositoryClass=StoriaRepository::class)
 */
class Storia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"storia"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $etnia;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $particolariOsservanze;

    /**
     * @ORM\OneToMany(targetEntity=Parente::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $parentes;

    /**
     * @ORM\OneToMany(targetEntity=PercorsoMigratorio::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $percorsoMigratorios;

    /**
     * @ORM\OneToOne(targetEntity=Hotspot::class, mappedBy="storia", cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $hotspot;

    /**
     * @ORM\OneToOne(targetEntity=CPA::class, mappedBy="storia", cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $cPA;

    /**
     * @ORM\OneToOne(targetEntity=SecondaAccoglienza::class, mappedBy="storia", cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $secondaAccoglienza;

    /**
     * @ORM\OneToMany(targetEntity=Allontanamento::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $allontanamentos;

    /**
     * @ORM\OneToMany(targetEntity=ProgettoEducativoIndividuale::class, mappedBy="storia",cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $progettoEducativoIndividuales;

    /**
     * @ORM\OneToMany(targetEntity=RelazioneAssistenteSociale::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $relazioneAssistenteSociales;

    /**
     * @ORM\OneToMany(targetEntity=Affido::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $affidos;

    /**
     * @ORM\OneToMany(targetEntity=Adozione::class, mappedBy="storia", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"storia"})
     */
    private $adoziones;

    /**
     * @ORM\OneToOne(targetEntity=ValutazioneMultidisciplinare::class, mappedBy="storia", cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $valutazioneMultidisciplinare;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $informazioniVitaMinore;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $scuola;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $hobbies;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $ragioniEspatrio;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $timoriManifestatiRientroPaeseOrigine;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $informazioniViaggioPaeseOrigine;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $osservazioniEducatori;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $areaMultidisciplinare;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $diarioInterventi;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="storia", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    public function __construct()
    {
        $this->parentes = new ArrayCollection();
        $this->percorsoMigratorios = new ArrayCollection();
        $this->allontanamentos = new ArrayCollection();
        $this->progettoEducativoIndividuales = new ArrayCollection();
        $this->relazioneAssistenteSociales = new ArrayCollection();
        $this->affidos = new ArrayCollection();
        $this->adoziones = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Storia
    {
        $storia = new self();
        $storia->setCartellaSociale($cartellaSociale);
        return $storia;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtnia(): ?string
    {
        return $this->etnia;
    }

    public function setEtnia(?string $etnia): self
    {
        $this->etnia = $etnia;

        return $this;
    }

    public function getParticolariOsservanze(): ?string
    {
        return $this->particolariOsservanze;
    }

    public function setParticolariOsservanze(?string $particolariOsservanze): self
    {
        $this->particolariOsservanze = $particolariOsservanze;

        return $this;
    }

    /**
     * @return Collection<int, Parente>
     */
    public function getParentes(): Collection
    {
        return $this->parentes;
    }

    public function addParente(Parente $parente): self
    {
        if (!$this->parentes->contains($parente)) {
            $this->parentes[] = $parente;
            $parente->setStoria($this);
        }

        return $this;
    }

    public function removeParente(Parente $parente): self
    {
        if ($this->parentes->removeElement($parente)) {
            // set the owning side to null (unless already changed)
            if ($parente->getStoria() === $this) {
                $parente->setStoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PercorsoMigratorio>
     */
    public function getPercorsoMigratorios(): Collection
    {
        return $this->percorsoMigratorios;
    }

    public function addPercorsoMigratorio(PercorsoMigratorio $percorsoMigratorio): self
    {
        if (!$this->percorsoMigratorios->contains($percorsoMigratorio)) {
            $this->percorsoMigratorios[] = $percorsoMigratorio;
            $percorsoMigratorio->setStoria($this);
        }

        return $this;
    }

    public function removePercorsoMigratorio(PercorsoMigratorio $percorsoMigratorio): self
    {
        if ($this->percorsoMigratorios->removeElement($percorsoMigratorio)) {
            // set the owning side to null (unless already changed)
            if ($percorsoMigratorio->getStoria() === $this) {
                $percorsoMigratorio->setStoria(null);
            }
        }

        return $this;
    }

    public function getHotspot(): ?Hotspot
    {
        return $this->hotspot;
    }

    public function setHotspot(Hotspot $hotspot): self
    {
        // set the owning side of the relation if necessary
        if ($hotspot->getStoria() !== $this) {
            $hotspot->setStoria($this);
        }

        $this->hotspot = $hotspot;

        return $this;
    }

    public function getCPA(): ?CPA
    {
        return $this->cPA;
    }

    public function setCPA(CPA $cPA): self
    {
        // set the owning side of the relation if necessary
        if ($cPA->getStoria() !== $this) {
            $cPA->setStoria($this);
        }

        $this->cPA = $cPA;

        return $this;
    }

    public function getSecondaAccoglienza(): ?SecondaAccoglienza
    {
        return $this->secondaAccoglienza;
    }

    public function setSecondaAccoglienza(SecondaAccoglienza $secondaAccoglienza): self
    {
        // set the owning side of the relation if necessary
        if ($secondaAccoglienza->getStoria() !== $this) {
            $secondaAccoglienza->setStoria($this);
        }

        $this->secondaAccoglienza = $secondaAccoglienza;

        return $this;
    }

    /**
     * @return Collection<int, Allontanamento>
     */
    public function getAllontanamentos(): Collection
    {
        return $this->allontanamentos;
    }

    public function addAllontanamento(Allontanamento $allontanamento): self
    {
        if (!$this->allontanamentos->contains($allontanamento)) {
            $this->allontanamentos[] = $allontanamento;
            $allontanamento->setStoria($this);
        }

        return $this;
    }

    public function removeAllontanamento(Allontanamento $allontanamento): self
    {
        if ($this->allontanamentos->removeElement($allontanamento)) {
            // set the owning side to null (unless already changed)
            if ($allontanamento->getStoria() === $this) {
                $allontanamento->setStoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProgettoEducativoIndividuale>
     */
    public function getProgettoEducativoIndividuales(): Collection
    {
        return $this->progettoEducativoIndividuales;
    }

    public function addProgettoEducativoIndividuale(ProgettoEducativoIndividuale $progettoEducativoIndividuale): self
    {
        if (!$this->progettoEducativoIndividuales->contains($progettoEducativoIndividuale)) {
            $this->progettoEducativoIndividuales[] = $progettoEducativoIndividuale;
            $progettoEducativoIndividuale->setStoria($this);
        }

        return $this;
    }

    public function removeProgettoEducativoIndividuale(ProgettoEducativoIndividuale $progettoEducativoIndividuale): self
    {
        if ($this->progettoEducativoIndividuales->removeElement($progettoEducativoIndividuale)) {
            // set the owning side to null (unless already changed)
            if ($progettoEducativoIndividuale->getStoria() === $this) {
                $progettoEducativoIndividuale->setStoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RelazioneAssistenteSociale>
     */
    public function getRelazioneAssistenteSociales(): Collection
    {
        return $this->relazioneAssistenteSociales;
    }

    public function addRelazioneAssistenteSociale(RelazioneAssistenteSociale $relazioneAssistenteSociale): self
    {
        if (!$this->relazioneAssistenteSociales->contains($relazioneAssistenteSociale)) {
            $this->relazioneAssistenteSociales[] = $relazioneAssistenteSociale;
            $relazioneAssistenteSociale->setStoria($this);
        }

        return $this;
    }

    public function removeRelazioneAssistenteSociale(RelazioneAssistenteSociale $relazioneAssistenteSociale): self
    {
        if ($this->relazioneAssistenteSociales->removeElement($relazioneAssistenteSociale)) {
            // set the owning side to null (unless already changed)
            if ($relazioneAssistenteSociale->getStoria() === $this) {
                $relazioneAssistenteSociale->setStoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Affido>
     */
    public function getAffidos(): Collection
    {
        return $this->affidos;
    }

    public function addAffido(Affido $affido): self
    {
        if (!$this->affidos->contains($affido)) {
            $this->affidos[] = $affido;
            $affido->setStoria($this);
        }

        return $this;
    }

    public function removeAffido(Affido $affido): self
    {
        if ($this->affidos->removeElement($affido)) {
            // set the owning side to null (unless already changed)
            if ($affido->getStoria() === $this) {
                $affido->setStoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adozione>
     */
    public function getAdoziones(): Collection
    {
        return $this->adoziones;
    }

    public function addAdozione(Adozione $adozione): self
    {
        if (!$this->adoziones->contains($adozione)) {
            $this->adoziones[] = $adozione;
            $adozione->setStoria($this);
        }

        return $this;
    }

    public function removeAdozione(Adozione $adozione): self
    {
        if ($this->adoziones->removeElement($adozione)) {
            // set the owning side to null (unless already changed)
            if ($adozione->getStoria() === $this) {
                $adozione->setStoria(null);
            }
        }

        return $this;
    }

    public function getValutazioneMultidisciplinare(): ?ValutazioneMultidisciplinare
    {
        return $this->valutazioneMultidisciplinare;
    }

    public function setValutazioneMultidisciplinare(ValutazioneMultidisciplinare $valutazioneMultidisciplinare): self
    {
        // set the owning side of the relation if necessary
        if ($valutazioneMultidisciplinare->getStoria() !== $this) {
            $valutazioneMultidisciplinare->setStoria($this);
        }

        $this->valutazioneMultidisciplinare = $valutazioneMultidisciplinare;

        return $this;
    }

    public function getInformazioniVitaMinore(): ?string
    {
        return $this->informazioniVitaMinore;
    }

    public function setInformazioniVitaMinore(?string $informazioniVitaMinore): self
    {
        $this->informazioniVitaMinore = $informazioniVitaMinore;

        return $this;
    }

    public function getScuola(): ?string
    {
        return $this->scuola;
    }

    public function setScuola(?string $scuola): self
    {
        $this->scuola = $scuola;

        return $this;
    }

    public function getHobbies(): ?string
    {
        return $this->hobbies;
    }

    public function setHobbies(?string $hobbies): self
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function getRagioniEspatrio(): ?string
    {
        return $this->ragioniEspatrio;
    }

    public function setRagioniEspatrio(?string $ragioniEspatrio): self
    {
        $this->ragioniEspatrio = $ragioniEspatrio;

        return $this;
    }

    public function getTimoriManifestatiRientroPaeseOrigine(): ?string
    {
        return $this->timoriManifestatiRientroPaeseOrigine;
    }

    public function setTimoriManifestatiRientroPaeseOrigine(?string $timoriManifestatiRientroPaeseOrigine): self
    {
        $this->timoriManifestatiRientroPaeseOrigine = $timoriManifestatiRientroPaeseOrigine;

        return $this;
    }

    public function getInformazioniViaggioPaeseOrigine(): ?string
    {
        return $this->informazioniViaggioPaeseOrigine;
    }

    public function setInformazioniViaggioPaeseOrigine(?string $informazioniViaggioPaeseOrigine): self
    {
        $this->informazioniViaggioPaeseOrigine = $informazioniViaggioPaeseOrigine;

        return $this;
    }

    public function getOsservazioniEducatori(): ?string
    {
        return $this->osservazioniEducatori;
    }

    public function setOsservazioniEducatori(?string $osservazioniEducatori): self
    {
        $this->osservazioniEducatori = $osservazioniEducatori;

        return $this;
    }

    public function getAreaMultidisciplinare(): ?string
    {
        return $this->areaMultidisciplinare;
    }

    public function setAreaMultidisciplinare(?string $areaMultidisciplinare): self
    {
        $this->areaMultidisciplinare = $areaMultidisciplinare;

        return $this;
    }

    public function getDiarioInterventi(): ?string
    {
        return $this->diarioInterventi;
    }

    public function setDiarioInterventi(?string $diarioInterventi): self
    {
        $this->diarioInterventi = $diarioInterventi;

        return $this;
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
}
