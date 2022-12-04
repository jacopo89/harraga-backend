<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AmministrativaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"amministrativa"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"amministrativa"}},
 * )
 * @ORM\Entity(repositoryClass=AmministrativaRepository::class)
 */
class Amministrativa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="amministrativa", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=PermessoSoggiorno::class, mappedBy="amministrativa", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"amministrativa"})
     */
    private $permessoSoggiornos;

    /**
     * @ORM\OneToMany(targetEntity=ProvvedimentoGiudiziario::class, mappedBy="amministrativa", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"amministrativa"})
     */
    private $provvedimentoGiudiziarios;

    /**
     * @ORM\OneToOne(targetEntity=RiferimentoLegale::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $riferimentoLegale;

    /**
     * @ORM\OneToOne(targetEntity=RevocaTutela::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private ?RevocaTutela $revocaTutela;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $pattoAccoglienza;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $tesseraSanitaria;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $STP;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $codiceFiscale;

    /**
     * @ORM\OneToMany(targetEntity=DocumentoIdentitaAmministrativa::class, mappedBy="amministrativa", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups({"amministrativa"})
     */
    private $documentoIdentitaAmministrativas;

    /**
     * @ORM\OneToOne(targetEntity=FotoSegnalazione::class,  cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $fotoSegnalazione;

    /**
     * @ORM\OneToOne(targetEntity=ProseguimentoAmministrativo::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $proseguimentoAmministrativo;

    /**
     * @ORM\OneToOne(targetEntity=Affidamento::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $affidamento;

    /**
     * @ORM\OneToMany(targetEntity=ProceduraLegale::class, mappedBy="amministrativa", orphanRemoval=true,cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $proceduraLegales;

    /**
     * @ORM\OneToOne(targetEntity=DelegaAmministrativa::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $delegaAmministrativa;

    public function __construct()
    {
        $this->permessoSoggiornos = new ArrayCollection();
        $this->provvedimentoGiudiziarios = new ArrayCollection();
        $this->documentoIdentitaAmministrativas = new ArrayCollection();
        $this->proceduraLegales = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Amministrativa
    {
        $amministrativa = new self();
        $amministrativa->setCartellaSociale($cartellaSociale);
        return $amministrativa;
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
     * @return Collection<int, PermessoSoggiorno>
     */
    public function getPermessoSoggiornos(): Collection
    {
        return $this->permessoSoggiornos;
    }

    public function addPermessoSoggiorno(PermessoSoggiorno $permessoSoggiorno): self
    {
        if (!$this->permessoSoggiornos->contains($permessoSoggiorno)) {
            $this->permessoSoggiornos[] = $permessoSoggiorno;
            $permessoSoggiorno->setAmministrativa($this);
        }

        return $this;
    }

    public function removePermessoSoggiorno(PermessoSoggiorno $permessoSoggiorno): self
    {
        if ($this->permessoSoggiornos->removeElement($permessoSoggiorno)) {
            // set the owning side to null (unless already changed)
            if ($permessoSoggiorno->getAmministrativa() === $this) {
                $permessoSoggiorno->setAmministrativa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProvvedimentoGiudiziario>
     */
    public function getProvvedimentoGiudiziarios(): Collection
    {
        return $this->provvedimentoGiudiziarios;
    }

    public function addProvvedimentoGiudiziario(ProvvedimentoGiudiziario $provvedimentoGiudiziario): self
    {
        if (!$this->provvedimentoGiudiziarios->contains($provvedimentoGiudiziario)) {
            $this->provvedimentoGiudiziarios[] = $provvedimentoGiudiziario;
            $provvedimentoGiudiziario->setAmministrativa($this);
        }

        return $this;
    }

    public function removeProvvedimentoGiudiziario(ProvvedimentoGiudiziario $provvedimentoGiudiziario): self
    {
        if ($this->provvedimentoGiudiziarios->removeElement($provvedimentoGiudiziario)) {
            // set the owning side to null (unless already changed)
            if ($provvedimentoGiudiziario->getAmministrativa() === $this) {
                $provvedimentoGiudiziario->setAmministrativa(null);
            }
        }

        return $this;
    }

    public function getRiferimentoLegale(): ?RiferimentoLegale
    {
        return $this->riferimentoLegale;
    }

    public function setRiferimentoLegale(?RiferimentoLegale $riferimentoLegale): self
    {
        $this->riferimentoLegale = $riferimentoLegale;

        return $this;
    }

    public function getRevocaTutela(): ?RevocaTutela
    {
        return $this->revocaTutela;
    }

    public function setRevocaTutela(?RevocaTutela $revocaTutela): self
    {
        $this->revocaTutela = $revocaTutela;

        return $this;
    }

    public function getPattoAccoglienza(): ?Allegato
    {
        return $this->pattoAccoglienza;
    }

    public function setPattoAccoglienza(?Allegato $pattoAccoglienza): self
    {
        $this->pattoAccoglienza = $pattoAccoglienza;

        return $this;
    }

    public function getTesseraSanitaria(): ?Allegato
    {
        return $this->tesseraSanitaria;
    }

    public function setTesseraSanitaria(?Allegato $tesseraSanitaria): self
    {
        $this->tesseraSanitaria = $tesseraSanitaria;

        return $this;
    }

    public function getSTP(): ?Allegato
    {
        return $this->STP;
    }

    public function setSTP(?Allegato $STP): self
    {
        $this->STP = $STP;

        return $this;
    }

    public function getCodiceFiscale(): ?Allegato
    {
        return $this->codiceFiscale;
    }

    public function setCodiceFiscale(?Allegato $codiceFiscale): self
    {
        $this->codiceFiscale = $codiceFiscale;

        return $this;
    }

    /**
     * @return Collection<int, DocumentoIdentitaAmministrativa>
     */
    public function getDocumentoIdentitaAmministrativas(): Collection
    {
        return $this->documentoIdentitaAmministrativas;
    }

    public function addDocumentoIdentitaAmministrativa(DocumentoIdentitaAmministrativa $documentoIdentitaAmministrativa): self
    {
        if (!$this->documentoIdentitaAmministrativas->contains($documentoIdentitaAmministrativa)) {
            $this->documentoIdentitaAmministrativas[] = $documentoIdentitaAmministrativa;
            $documentoIdentitaAmministrativa->setAmministrativa($this);
        }

        return $this;
    }

    public function removeDocumentoIdentitaAmministrativa(DocumentoIdentitaAmministrativa $documentoIdentitaAmministrativa): self
    {
        if ($this->documentoIdentitaAmministrativas->removeElement($documentoIdentitaAmministrativa)) {
            // set the owning side to null (unless already changed)
            if ($documentoIdentitaAmministrativa->getAmministrativa() === $this) {
                $documentoIdentitaAmministrativa->setAmministrativa(null);
            }
        }

        return $this;
    }

    public function getFotoSegnalazione(): ?FotoSegnalazione
    {
        return $this->fotoSegnalazione;
    }

    public function setFotoSegnalazione(?FotoSegnalazione $fotoSegnalazione): self
    {
        $this->fotoSegnalazione = $fotoSegnalazione;

        return $this;
    }

    public function getProseguimentoAmministrativo(): ?ProseguimentoAmministrativo
    {
        return $this->proseguimentoAmministrativo;
    }

    public function setProseguimentoAmministrativo(?ProseguimentoAmministrativo $proseguimentoAmministrativo): self
    {
        $this->proseguimentoAmministrativo = $proseguimentoAmministrativo;

        return $this;
    }

    public function getAffidamento(): ?Affidamento
    {
        return $this->affidamento;
    }

    public function setAffidamento(?Affidamento $affidamento): self
    {
        $this->affidamento = $affidamento;

        return $this;
    }

    /**
     * @return Collection<int, ProceduraLegale>
     */
    public function getProceduraLegales(): Collection
    {
        return $this->proceduraLegales;
    }

    public function addProceduraLegale(ProceduraLegale $proceduraLegale): self
    {
        if (!$this->proceduraLegales->contains($proceduraLegale)) {
            $this->proceduraLegales[] = $proceduraLegale;
            $proceduraLegale->setAmministrativa($this);
        }

        return $this;
    }

    public function removeProceduraLegale(ProceduraLegale $proceduraLegale): self
    {
        if ($this->proceduraLegales->removeElement($proceduraLegale)) {
            // set the owning side to null (unless already changed)
            if ($proceduraLegale->getAmministrativa() === $this) {
                $proceduraLegale->setAmministrativa(null);
            }
        }

        return $this;
    }

    public function getDelegaAmministrativa(): ?DelegaAmministrativa
    {
        return $this->delegaAmministrativa;
    }

    public function setDelegaAmministrativa(?DelegaAmministrativa $delegaAmministrativa): self
    {
        $this->delegaAmministrativa = $delegaAmministrativa;

        return $this;
    }
}
