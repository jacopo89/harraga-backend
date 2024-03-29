<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\UtenteCartellaSocialeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"cartella_sociale_utente"}}
 * )
 * @ORM\Entity(repositoryClass=UtenteCartellaSocialeRepository::class)
 *
 * @ApiFilter(SearchFilter::class, properties={"cartellaSociale.anagrafica.nome": "partial","cartellaSociale.anagrafica.cognome": "partial","cartellaSociale.anagrafica.paeseOrigine": "partial"})
 * @ApiFilter(BooleanFilter::class, properties={"cartellaSociale.anagrafica.italiano"})
 * @ApiFilter(DateFilter::class, properties={"cartellaSociale.anagrafica.dataNascitaCorretta"})
 */
class UtenteCartellaSociale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ("cartella_sociale_utente")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utente::class, inversedBy="utenteCartellaSociales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utente;

    /**
     * @ORM\ManyToOne(targetEntity=CartellaSociale::class, inversedBy="utenteCartellaSociales")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"cartella_sociale_utente"})
     */
    private $cartellaSociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruolo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtente(): ?Utente
    {
        return $this->utente;
    }

    public function setUtente(?Utente $utente): self
    {
        $this->utente = $utente;

        return $this;
    }

    public function getCartellaSociale(): ?CartellaSociale
    {
        return $this->cartellaSociale;
    }

    public function setCartellaSociale(?CartellaSociale $cartellaSociale): self
    {
        $this->cartellaSociale = $cartellaSociale;

        return $this;
    }

    public function getRuolo(): ?string
    {
        return $this->ruolo;
    }

    public function setRuolo(string $ruolo): self
    {
        $this->ruolo = $ruolo;

        return $this;
    }
}
