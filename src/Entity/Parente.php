<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ParenteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ParenteRepository::class)
 */
class Parente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"storia"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $relazioneParentela;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $cognome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $paeseOrigine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups ({"storia"})
     */
    private $inVita;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups ({"storia"})
     */
    private $inUE;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $note;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"storia"})
     */
    private $allegato;

    /**
     * @ORM\ManyToOne(targetEntity=Storia::class, inversedBy="parentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelazioneParentela(): ?string
    {
        return $this->relazioneParentela;
    }

    public function setRelazioneParentela(?string $relazioneParentela): self
    {
        $this->relazioneParentela = $relazioneParentela;

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

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(?string $cognome): self
    {
        $this->cognome = $cognome;

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

    public function getPaeseOrigine(): ?string
    {
        return $this->paeseOrigine;
    }

    public function setPaeseOrigine(?string $paeseOrigine): self
    {
        $this->paeseOrigine = $paeseOrigine;

        return $this;
    }

    public function getInVita(): ?bool
    {
        return $this->inVita;
    }

    public function setInVita(?bool $inVita): self
    {
        $this->inVita = $inVita;

        return $this;
    }

    public function getInUE(): ?bool
    {
        return $this->inUE;
    }

    public function setInUE(?bool $inUE): self
    {
        $this->inUE = $inUE;

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

    public function getAllegato(): ?Allegato
    {
        return $this->allegato;
    }

    public function setAllegato(?Allegato $allegato): self
    {
        $this->allegato = $allegato;

        return $this;
    }

    public function getStoria(): ?Storia
    {
        return $this->storia;
    }

    public function setStoria(?Storia $storia): self
    {
        $this->storia = $storia;

        return $this;
    }
}
