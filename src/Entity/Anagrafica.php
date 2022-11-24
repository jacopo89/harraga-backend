<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnagraficaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"anagrafica"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"anagrafica"}},
 * )
 * @ORM\Entity(repositoryClass=AnagraficaRepository::class)
 */
class Anagrafica
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"cartella","anagrafica"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="anagrafica")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"anagrafica"})
     *
     */
    private $cartellaSociale;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"cartella","anagrafica"})
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"cartella","anagrafica"})
     */
    private $cognome;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"cartella","anagrafica"})
     */
    private $numeroTutela;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $altroNome;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $italiano;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $sesso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $luogoNascita;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $paeseOrigine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $cittadinanza;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $dataNascitaPrimaIdentificazione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $dataNascitaCorretta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $linguaMadre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $gruppoEtnicoAppartenenza;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $dataArrivoInItalia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"cartella","anagrafica"})
     */
    private $luogoArrivoInItalia;

    /**
     * @ORM\OneToMany(targetEntity=DocumentoIdentita::class, mappedBy="anagrafica",cascade={"persist", "remove"})
     * @Groups ({"cartella","anagrafica"})
     */
    private $documentoIdentitas;

    /**
     * @ORM\OneToOne(targetEntity=Mediatore::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $mediatore;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $unitaOperativa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $dataAssegnazioneUO;

    /**
     * @ORM\OneToOne(targetEntity=PolizzaAssicurativa::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $polizzaAssicurativa;

    /**
     * @ORM\OneToOne(targetEntity=Tutore::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $tutore;

    /**
     * @ORM\OneToOne(targetEntity=AssistenteSociale::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $assistenteSociale;

    /**
     * @ORM\OneToOne(targetEntity=DocumentiPossesso::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $documentiPossesso;

    /**
     * @ORM\OneToMany(targetEntity=Domicilio::class, mappedBy="anagrafica", orphanRemoval=true,cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $domicilios;

    public function __construct()
    {
        $this->documentoIdentitas = new ArrayCollection();
        $this->domicilios = new ArrayCollection();
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

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): self
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getNumeroTutela(): ?string
    {
        return $this->numeroTutela;
    }

    public function setNumeroTutela(string $numeroTutela): self
    {
        $this->numeroTutela = $numeroTutela;

        return $this;
    }

    public function getAltroNome(): ?string
    {
        return $this->altroNome;
    }

    public function setAltroNome(?string $altroNome): self
    {
        $this->altroNome = $altroNome;

        return $this;
    }

    public function getItaliano(): ?bool
    {
        return $this->italiano;
    }

    public function setItaliano(?bool $italiano): self
    {
        $this->italiano = $italiano;

        return $this;
    }

    public function getSesso(): ?string
    {
        return $this->sesso;
    }

    public function setSesso(?string $sesso): self
    {
        $this->sesso = $sesso;

        return $this;
    }

    public function getLuogoNascita(): ?string
    {
        return $this->luogoNascita;
    }

    public function setLuogoNascita(?string $luogoNascita): self
    {
        $this->luogoNascita = $luogoNascita;

        return $this;
    }

    public function getPaeseOrigine(): ?string
    {
        return $this->paeseOrigine;
    }

    public function setPaeseOrigine(?string $paeseOrigine): self
    {
        $this->paeseOrigine = $paeseOrigine;

        return $this;
    }

    public function getCittadinanza(): ?string
    {
        return $this->cittadinanza;
    }

    public function setCittadinanza(?string $cittadinanza): self
    {
        $this->cittadinanza = $cittadinanza;

        return $this;
    }

    public function getDataNascitaPrimaIdentificazione(): ?string
    {
        return $this->dataNascitaPrimaIdentificazione;
    }

    public function setDataNascitaPrimaIdentificazione(?string $dataNascitaPrimaIdentificazione): self
    {
        $this->dataNascitaPrimaIdentificazione = $dataNascitaPrimaIdentificazione;

        return $this;
    }

    public function getDataNascitaCorretta(): ?string
    {
        return $this->dataNascitaCorretta;
    }

    public function setDataNascitaCorretta(?string $dataNascitaCorretta): self
    {
        $this->dataNascitaCorretta = $dataNascitaCorretta;

        return $this;
    }

    public function getLinguaMadre(): ?string
    {
        return $this->linguaMadre;
    }

    public function setLinguaMadre(?string $linguaMadre): self
    {
        $this->linguaMadre = $linguaMadre;

        return $this;
    }

    public function getGruppoEtnicoAppartenenza(): ?string
    {
        return $this->gruppoEtnicoAppartenenza;
    }

    public function setGruppoEtnicoAppartenenza(?string $gruppoEtnicoAppartenenza): self
    {
        $this->gruppoEtnicoAppartenenza = $gruppoEtnicoAppartenenza;

        return $this;
    }

    public function getDataArrivoInItalia(): ?\DateTimeInterface
    {
        return $this->dataArrivoInItalia;
    }

    public function setDataArrivoInItalia(?\DateTimeInterface $dataArrivoInItalia): self
    {
        $this->dataArrivoInItalia = $dataArrivoInItalia;

        return $this;
    }

    public function getLuogoArrivoInItalia(): ?string
    {
        return $this->luogoArrivoInItalia;
    }

    public function setLuogoArrivoInItalia(?string $luogoArrivoInItalia): self
    {
        $this->luogoArrivoInItalia = $luogoArrivoInItalia;

        return $this;
    }

    /**
     * @return Collection<int, DocumentoIdentita>
     */
    public function getDocumentoIdentitas(): Collection
    {
        return $this->documentoIdentitas;
    }

    public function addDocumentoIdentita(DocumentoIdentita $documentoIdentita): self
    {
        if (!$this->documentoIdentitas->contains($documentoIdentita)) {
            $this->documentoIdentitas[] = $documentoIdentita;
            $documentoIdentita->setAnagrafica($this);
        }

        return $this;
    }

    public function removeDocumentoIdentita(DocumentoIdentita $documentoIdentita): self
    {
        if ($this->documentoIdentitas->removeElement($documentoIdentita)) {
            // set the owning side to null (unless already changed)
            if ($documentoIdentita->getAnagrafica() === $this) {
                $documentoIdentita->setAnagrafica(null);
            }
        }

        return $this;
    }

    public function getMediatore(): ?Mediatore
    {
        return $this->mediatore;
    }

    public function setMediatore(?Mediatore $mediatore): self
    {
        $this->mediatore = $mediatore;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getUnitaOperativa(): ?string
    {
        return $this->unitaOperativa;
    }

    public function setUnitaOperativa(?string $unitaOperativa): self
    {
        $this->unitaOperativa = $unitaOperativa;

        return $this;
    }

    public function getDataAssegnazioneUO(): ?string
    {
        return $this->dataAssegnazioneUO;
    }

    public function setDataAssegnazioneUO(?string $dataAssegnazioneUO): self
    {
        $this->dataAssegnazioneUO = $dataAssegnazioneUO;

        return $this;
    }

    public function getPolizzaAssicurativa(): ?PolizzaAssicurativa
    {
        return $this->polizzaAssicurativa;
    }

    public function setPolizzaAssicurativa(?PolizzaAssicurativa $polizzaAssicurativa): self
    {
        $this->polizzaAssicurativa = $polizzaAssicurativa;

        return $this;
    }

    public function getTutore(): ?Tutore
    {
        return $this->tutore;
    }

    public function setTutore(?Tutore $tutore): self
    {
        $this->tutore = $tutore;

        return $this;
    }

    public function getAssistenteSociale(): ?AssistenteSociale
    {
        return $this->assistenteSociale;
    }

    public function setAssistenteSociale(?AssistenteSociale $assistenteSociale): self
    {
        $this->assistenteSociale = $assistenteSociale;

        return $this;
    }

    public function getDocumentiPossesso(): ?DocumentiPossesso
    {
        return $this->documentiPossesso;
    }

    public function setDocumentiPossesso(?DocumentiPossesso $documentiPossesso): self
    {
        $this->documentiPossesso = $documentiPossesso;

        return $this;
    }

    /**
     * @return Collection<int, Domicilio>
     */
    public function getDomicilios(): Collection
    {
        return $this->domicilios;
    }

    public function addDomicilio(Domicilio $domicilio): self
    {
        if (!$this->domicilios->contains($domicilio)) {
            $this->domicilios[] = $domicilio;
            $domicilio->setAnagrafica($this);
        }

        return $this;
    }

    public function removeDomicilio(Domicilio $domicilio): self
    {
        if ($this->domicilios->removeElement($domicilio)) {
            // set the owning side to null (unless already changed)
            if ($domicilio->getAnagrafica() === $this) {
                $domicilio->setAnagrafica(null);
            }
        }

        return $this;
    }
}
