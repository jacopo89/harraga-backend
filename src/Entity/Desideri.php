<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DesideriRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"desideri"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"desideri"}},
 * )
 * @ORM\Entity(repositoryClass=DesideriRepository::class)
 */
class Desideri
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"desideri"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=CartellaSociale::class, inversedBy="desideri", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartellaSociale;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"desideri"})
     */
    private $aspirazioni;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"desideri"})
     */
    private $ascoltoMinore;

    public static function fromCartellaSociale(CartellaSociale $cartellaSociale): Desideri
    {
        $desideri = new self();
        $desideri->setCartellaSociale($cartellaSociale);
        return $desideri;
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

    public function getAspirazioni(): ?string
    {
        return $this->aspirazioni;
    }

    public function setAspirazioni(?string $aspirazioni): self
    {
        $this->aspirazioni = $aspirazioni;

        return $this;
    }

    public function getAscoltoMinore(): ?string
    {
        return $this->ascoltoMinore;
    }

    public function setAscoltoMinore(?string $ascoltoMinore): self
    {
        $this->ascoltoMinore = $ascoltoMinore;

        return $this;
    }
}
