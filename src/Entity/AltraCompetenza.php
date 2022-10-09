<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AltraCompetenzaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AltraCompetenzaRepository::class)
 */
class AltraCompetenza
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competenze"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"competenze"})
     */
    private $tipo;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"competenze"})
     */
    private $descrizione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"competenze"})
     */
    private $livello;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $certificazione;

    /**
     * @ORM\ManyToOne(targetEntity=Competenze::class, inversedBy="altraCompetenzas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competenze;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(?string $descrizione): self
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    public function getLivello(): ?string
    {
        return $this->livello;
    }

    public function setLivello(?string $livello): self
    {
        $this->livello = $livello;

        return $this;
    }

    public function getCertificazione(): ?Allegato
    {
        return $this->certificazione;
    }

    public function setCertificazione(?Allegato $certificazione): self
    {
        $this->certificazione = $certificazione;

        return $this;
    }

    public function getCompetenze(): ?Competenze
    {
        return $this->competenze;
    }

    public function setCompetenze(?Competenze $competenze): self
    {
        $this->competenze = $competenze;

        return $this;
    }
}
