<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DelegaAmministrativaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DelegaAmministrativaRepository::class)
 */
class DelegaAmministrativa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"amministrativa"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $protocollo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $richiestaUONI;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $data;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"amministrativa"})
     */
    private $altro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProtocollo(): ?string
    {
        return $this->protocollo;
    }

    public function setProtocollo(?string $protocollo): self
    {
        $this->protocollo = $protocollo;

        return $this;
    }

    public function getRichiestaUONI(): ?string
    {
        return $this->richiestaUONI;
    }

    public function setRichiestaUONI(?string $richiestaUONI): self
    {
        $this->richiestaUONI = $richiestaUONI;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getAltro(): ?string
    {
        return $this->altro;
    }

    public function setAltro(?string $altro): self
    {
        $this->altro = $altro;

        return $this;
    }
}
