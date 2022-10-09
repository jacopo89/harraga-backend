<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RicorsoAmministrativoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RicorsoAmministrativoRepository::class)
 */
class RicorsoAmministrativo
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
    private $dataInoltroRicorso;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"amministrativa"})
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $nomeAvvocato;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"amministrativa"})
     */
    private $patrocinioGratuito;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dateUdienze = [];

    /**
     * @ORM\ManyToOne(targetEntity=ProceduraLegale::class, inversedBy="ricorsiAmministrativi")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proceduraLegale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataInoltroRicorso(): ?string
    {
        return $this->dataInoltroRicorso;
    }

    public function setDataInoltroRicorso(?string $dataInoltroRicorso): self
    {
        $this->dataInoltroRicorso = $dataInoltroRicorso;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNomeAvvocato(): ?string
    {
        return $this->nomeAvvocato;
    }

    public function setNomeAvvocato(?string $nomeAvvocato): self
    {
        $this->nomeAvvocato = $nomeAvvocato;

        return $this;
    }

    public function getPatrocinioGratuito(): ?bool
    {
        return $this->patrocinioGratuito;
    }

    public function setPatrocinioGratuito(?bool $patrocinioGratuito): self
    {
        $this->patrocinioGratuito = $patrocinioGratuito;

        return $this;
    }

    public function getDateUdienze(): ?array
    {
        return $this->dateUdienze;
    }

    public function setDateUdienze(?array $dateUdienze): self
    {
        $this->dateUdienze = $dateUdienze;

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
