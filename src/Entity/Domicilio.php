<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DomicilioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DomicilioRepository::class)
 */
class Domicilio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"anagrafica"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $tipologiaDomicilio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $tipoInserimento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $responsabile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $telefono;

    /**
     * @ORM\ManyToOne(targetEntity=Anagrafica::class, inversedBy="domicilios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anagrafica;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipologiaDomicilio(): ?string
    {
        return $this->tipologiaDomicilio;
    }

    public function setTipologiaDomicilio(?string $tipologiaDomicilio): self
    {
        $this->tipologiaDomicilio = $tipologiaDomicilio;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTipoInserimento(): ?string
    {
        return $this->tipoInserimento;
    }

    public function setTipoInserimento(?string $tipoInserimento): self
    {
        $this->tipoInserimento = $tipoInserimento;

        return $this;
    }

    public function getResponsabile(): ?string
    {
        return $this->responsabile;
    }

    public function setResponsabile(?string $responsabile): self
    {
        $this->responsabile = $responsabile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(?Anagrafica $anagrafica): self
    {
        $this->anagrafica = $anagrafica;

        return $this;
    }
}
