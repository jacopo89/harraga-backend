<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LinguaDichiarataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LinguaDichiarataRepository::class)
 */
class LinguaDichiarata
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
     * @ORM\ManyToOne(targetEntity=Competenze::class, inversedBy="linguaDichiaratas")
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

    public function setLingua(string $lingua): self
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
