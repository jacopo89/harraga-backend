<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CartellaSocialeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"cartella"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"cartella"}},
 * )
 * @ORM\Entity(repositoryClass=CartellaSocialeRepository::class)
 */
class CartellaSociale
{

    public function __construct()
    {
        $this->anagrafica = new Anagrafica();
        $this->amministrativa = new Amministrativa();
        $this->storia = new Storia();
        $this->sanitaria = new Sanitaria();
        $this->competenze = new Competenze();
        $this->desideri = new Desideri();
        $this->istruzione = new Istruzione();
        $this->lavoro = new Lavoro();
        $this->socialita = new Socialita();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"cartella"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Anagrafica::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     * @ApiSubresource
     * @Groups ({"cartella"})
     */
    private Anagrafica $anagrafica;

    /**
     * @ORM\OneToOne(targetEntity=Amministrativa::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     * @ApiSubresource
     */
    private Amministrativa $amministrativa;

    /**
     * @ORM\OneToOne(targetEntity=Storia::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Storia $storia;

    /**
     * @ORM\OneToOne(targetEntity=Sanitaria::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Sanitaria $sanitaria;

    /**
     * @ORM\OneToOne(targetEntity=Competenze::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Competenze $competenze;

    /**
     * @ORM\OneToOne(targetEntity=Desideri::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Desideri $desideri;

    /**
     * @ORM\OneToOne(targetEntity=Istruzione::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Istruzione $istruzione;

    /**
     * @ORM\OneToOne(targetEntity=Lavoro::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Lavoro $lavoro;

    /**
     * @ORM\OneToOne(targetEntity=Socialita::class, mappedBy="cartellaSociale", cascade={"persist", "remove"})
     */
    private Socialita $socialita;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(Anagrafica $anagrafica): self
    {
        // set the owning side of the relation if necessary
        if ($anagrafica->getCartellaSociale() !== $this) {
            $anagrafica->setCartellaSociale($this);
        }

        $this->anagrafica = $anagrafica;

        return $this;
    }

    public function getAmministrativa(): ?Amministrativa
    {
        return $this->amministrativa;
    }

    public function setAmministrativa(Amministrativa $amministrativa): self
    {
        // set the owning side of the relation if necessary
        if ($amministrativa->getCartellaSociale() !== $this) {
            $amministrativa->setCartellaSociale($this);
        }

        $this->amministrativa = $amministrativa;

        return $this;
    }

    public function getStoria(): ?Storia
    {
        return $this->storia;
    }

    public function setStoria(Storia $storia): self
    {
        // set the owning side of the relation if necessary
        if ($storia->getCartellaSociale() !== $this) {
            $storia->setCartellaSociale($this);
        }

        $this->storia = $storia;

        return $this;
    }

    public function getSanitaria(): ?Sanitaria
    {
        return $this->sanitaria;
    }

    public function setSanitaria(Sanitaria $sanitaria): self
    {
        // set the owning side of the relation if necessary
        if ($sanitaria->getCartellaSociale() !== $this) {
            $sanitaria->setCartellaSociale($this);
        }

        $this->sanitaria = $sanitaria;

        return $this;
    }

    public function getCompetenze(): ?Competenze
    {
        return $this->competenze;
    }

    public function setCompetenze(Competenze $competenze): self
    {
        // set the owning side of the relation if necessary
        if ($competenze->getCartellaSociale() !== $this) {
            $competenze->setCartellaSociale($this);
        }

        $this->competenze = $competenze;

        return $this;
    }

    public function getDesideri(): ?Desideri
    {
        return $this->desideri;
    }

    public function setDesideri(Desideri $desideri): self
    {
        // set the owning side of the relation if necessary
        if ($desideri->getCartellaSociale() !== $this) {
            $desideri->setCartellaSociale($this);
        }

        $this->desideri = $desideri;

        return $this;
    }

    public function getIstruzione(): ?Istruzione
    {
        return $this->istruzione;
    }

    public function setIstruzione(Istruzione $istruzione): self
    {
        // set the owning side of the relation if necessary
        if ($istruzione->getCartellaSociale() !== $this) {
            $istruzione->setCartellaSociale($this);
        }

        $this->istruzione = $istruzione;

        return $this;
    }

    public function getLavoro(): ?Lavoro
    {
        return $this->lavoro;
    }

    public function setLavoro(Lavoro $lavoro): self
    {
        // set the owning side of the relation if necessary
        if ($lavoro->getCartellaSociale() !== $this) {
            $lavoro->setCartellaSociale($this);
        }

        $this->lavoro = $lavoro;

        return $this;
    }

    public function getSocialita(): ?Socialita
    {
        return $this->socialita;
    }

    public function setSocialita(Socialita $socialita): self
    {
        // set the owning side of the relation if necessary
        if ($socialita->getCartellaSociale() !== $this) {
            $socialita->setCartellaSociale($this);
        }

        $this->socialita = $socialita;

        return $this;
    }
}
