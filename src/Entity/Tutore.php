<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TutoreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TutoreRepository::class)
 */
class Tutore
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
    private $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $cognome;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $numeroTutela;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $dataAssegnazione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $luogoAssegnazione;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $motivazioneTutela;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $tribunaleMinori;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $giudiceTutelare;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"anagrafica"})
     */
    private $rettificaTutela;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups ({"anagrafica"})
     */
    private $decretoTribunale;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumeroTutela(): ?string
    {
        return $this->numeroTutela;
    }

    public function setNumeroTutela(?string $numeroTutela): self
    {
        $this->numeroTutela = $numeroTutela;

        return $this;
    }

    public function getDataAssegnazione(): ?string
    {
        return $this->dataAssegnazione;
    }

    public function setDataAssegnazione(?string $dataAssegnazione): self
    {
        $this->dataAssegnazione = $dataAssegnazione;

        return $this;
    }

    public function getLuogoAssegnazione(): ?string
    {
        return $this->luogoAssegnazione;
    }

    public function setLuogoAssegnazione(?string $luogoAssegnazione): self
    {
        $this->luogoAssegnazione = $luogoAssegnazione;

        return $this;
    }

    public function getMotivazioneTutela(): ?string
    {
        return $this->motivazioneTutela;
    }

    public function setMotivazioneTutela(?string $motivazioneTutela): self
    {
        $this->motivazioneTutela = $motivazioneTutela;

        return $this;
    }

    public function getTribunaleMinori(): ?string
    {
        return $this->tribunaleMinori;
    }

    public function setTribunaleMinori(?string $tribunaleMinori): self
    {
        $this->tribunaleMinori = $tribunaleMinori;

        return $this;
    }

    public function getGiudiceTutelare(): ?string
    {
        return $this->giudiceTutelare;
    }

    public function setGiudiceTutelare(?string $giudiceTutelare): self
    {
        $this->giudiceTutelare = $giudiceTutelare;

        return $this;
    }

    public function getRettificaTutela(): ?string
    {
        return $this->rettificaTutela;
    }

    public function setRettificaTutela(?string $rettificaTutela): self
    {
        $this->rettificaTutela = $rettificaTutela;

        return $this;
    }

    public function getDecretoTribunale(): ?Allegato
    {
        return $this->decretoTribunale;
    }

    public function setDecretoTribunale(?Allegato $decretoTribunale): self
    {
        $this->decretoTribunale = $decretoTribunale;

        return $this;
    }
}
