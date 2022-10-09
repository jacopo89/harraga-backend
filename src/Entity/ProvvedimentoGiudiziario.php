<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProvvedimentoGiudiziarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProvvedimentoGiudiziarioRepository::class)
 */
class ProvvedimentoGiudiziario
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
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $istituzioneEmittente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $nomeAvvocato;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Amministrativa::class, inversedBy="provvedimentoGiudiziarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $amministrativa;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getIstituzioneEmittente(): ?string
    {
        return $this->istituzioneEmittente;
    }

    public function setIstituzioneEmittente(?string $istituzioneEmittente): self
    {
        $this->istituzioneEmittente = $istituzioneEmittente;

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

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(?Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }

    public function getAmministrativa(): ?Amministrativa
    {
        return $this->amministrativa;
    }

    public function setAmministrativa(?Amministrativa $amministrativa): self
    {
        $this->amministrativa = $amministrativa;

        return $this;
    }
}
