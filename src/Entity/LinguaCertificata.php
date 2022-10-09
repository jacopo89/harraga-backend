<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LinguaCertificataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LinguaCertificataRepository::class)
 */
class LinguaCertificata
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
    private $lingua;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"competenze"})
     */
    private $livelloScritto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"competenze"})
     */
    private $livelloOrale;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"competenze"})
     */
    private $certificazione;

    /**
     * @ORM\ManyToOne(targetEntity=Competenze::class, inversedBy="linguaCertificatas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competenze;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLingua(): ?string
    {
        return $this->lingua;
    }

    public function setLingua(?string $lingua): self
    {
        $this->lingua = $lingua;

        return $this;
    }

    public function getLivelloScritto(): ?string
    {
        return $this->livelloScritto;
    }

    public function setLivelloScritto(?string $livelloScritto): self
    {
        $this->livelloScritto = $livelloScritto;

        return $this;
    }

    public function getLivelloOrale(): ?string
    {
        return $this->livelloOrale;
    }

    public function setLivelloOrale(?string $livelloOrale): self
    {
        $this->livelloOrale = $livelloOrale;

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
