<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SocialitaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ApiResource(
 *     normalizationContext={"groups"={"socialita"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"socialita"}},
 * )
 * @ORM\Entity(repositoryClass=SocialitaRepository::class)
 */
class Socialita
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"socialita"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="socialita", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=EsperienzaVolontariato::class, mappedBy="socialita", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"socialita"})
     */
    private $esperienzaVolontariatos;

    /**
     * @ORM\OneToMany(targetEntity=Laboratorio::class, mappedBy="socialita", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"socialita"})
     */
    private $laboratorios;

    /**
     * @ORM\OneToMany(targetEntity=AttivitaSportiva::class, mappedBy="socialita", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"socialita"})
     */
    private $attivitaSportivas;

    /**
     * @ORM\OneToMany(targetEntity=Associazione::class, mappedBy="socialita", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"socialita"})
     */
    private $associaziones;

    public function __construct()
    {
        $this->esperienzaVolontariatos = new ArrayCollection();
        $this->laboratorios = new ArrayCollection();
        $this->attivitaSportivas = new ArrayCollection();
        $this->associaziones = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Socialita
    {
        $socialita = new self();
        $socialita->setCartellaSociale($cartellaSociale);
        return $socialita;
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
     * @return Collection<int, EsperienzaVolontariato>
     */
    public function getEsperienzaVolontariatos(): Collection
    {
        return $this->esperienzaVolontariatos;
    }

    public function addEsperienzaVolontariato(EsperienzaVolontariato $esperienzaVolontariato): self
    {
        if (!$this->esperienzaVolontariatos->contains($esperienzaVolontariato)) {
            $this->esperienzaVolontariatos[] = $esperienzaVolontariato;
            $esperienzaVolontariato->setSocialita($this);
        }

        return $this;
    }

    public function removeEsperienzaVolontariato(EsperienzaVolontariato $esperienzaVolontariato): self
    {
        if ($this->esperienzaVolontariatos->removeElement($esperienzaVolontariato)) {
            // set the owning side to null (unless already changed)
            if ($esperienzaVolontariato->getSocialita() === $this) {
                $esperienzaVolontariato->setSocialita(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Laboratorio>
     */
    public function getLaboratorios(): Collection
    {
        return $this->laboratorios;
    }

    public function addLaboratorio(Laboratorio $laboratorio): self
    {
        if (!$this->laboratorios->contains($laboratorio)) {
            $this->laboratorios[] = $laboratorio;
            $laboratorio->setSocialita($this);
        }

        return $this;
    }

    public function removeLaboratorio(Laboratorio $laboratorio): self
    {
        if ($this->laboratorios->removeElement($laboratorio)) {
            // set the owning side to null (unless already changed)
            if ($laboratorio->getSocialita() === $this) {
                $laboratorio->setSocialita(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AttivitaSportiva>
     */
    public function getAttivitaSportivas(): Collection
    {
        return $this->attivitaSportivas;
    }

    public function addAttivitaSportiva(AttivitaSportiva $attivitaSportiva): self
    {
        if (!$this->attivitaSportivas->contains($attivitaSportiva)) {
            $this->attivitaSportivas[] = $attivitaSportiva;
            $attivitaSportiva->setSocialita($this);
        }

        return $this;
    }

    public function removeAttivitaSportiva(AttivitaSportiva $attivitaSportiva): self
    {
        if ($this->attivitaSportivas->removeElement($attivitaSportiva)) {
            // set the owning side to null (unless already changed)
            if ($attivitaSportiva->getSocialita() === $this) {
                $attivitaSportiva->setSocialita(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Associazione>
     */
    public function getAssociaziones(): Collection
    {
        return $this->associaziones;
    }

    public function addAssociazione(Associazione $associazione): self
    {
        if (!$this->associaziones->contains($associazione)) {
            $this->associaziones[] = $associazione;
            $associazione->setSocialita($this);
        }

        return $this;
    }

    public function removeAssociazione(Associazione $associazione): self
    {
        if ($this->associaziones->removeElement($associazione)) {
            // set the owning side to null (unless already changed)
            if ($associazione->getSocialita() === $this) {
                $associazione->setSocialita(null);
            }
        }

        return $this;
    }
}
