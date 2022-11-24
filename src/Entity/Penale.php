<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PenaleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PenaleRepository::class)
 */
class Penale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="penale", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

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
}
