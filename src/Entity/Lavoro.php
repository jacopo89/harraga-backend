<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LavoroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"lavoro"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"lavoro"}},
 * )
 * @ORM\Entity(repositoryClass=LavoroRepository::class)
 */
class Lavoro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"lavoro"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="lavoro", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\OneToMany(targetEntity=EsperienzaLavorativa::class, mappedBy="lavoro", orphanRemoval=true, cascade={"persist", "remove"})
     * @Groups({"lavoro"})
     */
    private $esperienzaLavorativas;

    public function __construct()
    {
        $this->esperienzaLavorativas = new ArrayCollection();
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
     * @return Collection<int, EsperienzaLavorativa>
     */
    public function getEsperienzaLavorativas(): Collection
    {
        return $this->esperienzaLavorativas;
    }

    public function addEsperienzaLavorativa(EsperienzaLavorativa $esperienzaLavorativa): self
    {
        if (!$this->esperienzaLavorativas->contains($esperienzaLavorativa)) {
            $this->esperienzaLavorativas[] = $esperienzaLavorativa;
            $esperienzaLavorativa->setLavoro($this);
        }

        return $this;
    }

    public function removeEsperienzaLavorativa(EsperienzaLavorativa $esperienzaLavorativa): self
    {
        if ($this->esperienzaLavorativas->removeElement($esperienzaLavorativa)) {
            // set the owning side to null (unless already changed)
            if ($esperienzaLavorativa->getLavoro() === $this) {
                $esperienzaLavorativa->setLavoro(null);
            }
        }

        return $this;
    }
}
