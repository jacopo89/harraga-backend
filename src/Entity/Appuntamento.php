<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AppuntamentoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AppuntamentoRepository::class)
 * @ApiResource ()
 */
class Appuntamento
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
    private $luogo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $motivo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $esiti;

    /**
     * @ORM\ManyToOne(targetEntity=ProceduraLegale::class, inversedBy="appuntamenti")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proceduraLegale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLuogo(): ?string
    {
        return $this->luogo;
    }

    public function setLuogo(?string $luogo): self
    {
        $this->luogo = $luogo;

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

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getEsiti(): ?string
    {
        return $this->esiti;
    }

    public function setEsiti(?string $esiti): self
    {
        $this->esiti = $esiti;

        return $this;
    }

    public function getProceduraLegale(): ?ProceduraLegale
    {
        return $this->proceduraLegale;
    }

    public function setProceduraLegale(?ProceduraLegale $proceduraLegale): self
    {
        $this->proceduraLegale = $proceduraLegale;

        return $this;
    }
}
