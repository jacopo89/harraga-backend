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
}
