<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PenaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"penale"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"penale"}},
 * )
 * @ORM\Entity(repositoryClass=PenaleRepository::class)
 */
class Penale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"penale"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="penale", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"penale"})
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=ProceduraPenale::class, mappedBy="penale", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups ({"penale"})
     */
    private $proceduraPenales;

    public function __construct()
    {
        $this->proceduraPenales = new ArrayCollection();
    }

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale)
    {
        $penale = new self();
        $penale->setCartellaSociale($cartellaSociale);
        return $penale;
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
     * @return Collection<int, ProceduraPenale>
     */
    public function getProceduraPenales(): Collection
    {
        return $this->proceduraPenales;
    }

    public function addProceduraPenale(ProceduraPenale $procedurePenali): self
    {
        if (!$this->proceduraPenales->contains($procedurePenali)) {
            $this->proceduraPenales[] = $procedurePenali;
            $procedurePenali->setPenale($this);
        }

        return $this;
    }

    public function removeProceduraPenale(ProceduraPenale $procedurePenali): self
    {
        if ($this->proceduraPenales->removeElement($procedurePenali)) {
            // set the owning side to null (unless already changed)
            if ($procedurePenali->getPenale() === $this) {
                $procedurePenali->setPenale(null);
            }
        }

        return $this;
    }
}
