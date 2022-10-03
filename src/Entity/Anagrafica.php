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

    public function __construct()
    {
        $this->documentoIdentitas = new ArrayCollection();
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
}
