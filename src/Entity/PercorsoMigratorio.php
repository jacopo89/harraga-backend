<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PercorsoMigratorioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PercorsoMigratorioRepository::class)
 */
class PercorsoMigratorio
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
    private $annoPartenza;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $luogoPartenza;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $ragioniEspatrio;

    /**
     * @ORM\Column(type="json")
     * @Groups ({"storia"})
     */
    private $paesiAttraversati = [];

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"storia"})
     */
    private $eventualiTimoriManifestati;

    /**
     * @ORM\ManyToOne(targetEntity=Storia::class, inversedBy="percorsoMigratorios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnoPartenza(): ?string
    {
        return $this->annoPartenza;
    }

    public function setAnnoPartenza(?string $annoPartenza): self
    {
        $this->annoPartenza = $annoPartenza;

        return $this;
    }

    public function getLuogoPartenza(): ?string
    {
        return $this->luogoPartenza;
    }

    public function setLuogoPartenza(?string $luogoPartenza): self
    {
        $this->luogoPartenza = $luogoPartenza;

        return $this;
    }

    public function getRagioniEspatrio(): ?string
    {
        return $this->ragioniEspatrio;
    }

    public function setRagioniEspatrio(?string $ragioniEspatrio): self
    {
        $this->ragioniEspatrio = $ragioniEspatrio;

        return $this;
    }

    public function getPaesiAttraversati(): ?array
    {
        return $this->paesiAttraversati;
    }

    public function setPaesiAttraversati(array $paesiAttraversati): self
    {
        $this->paesiAttraversati = $paesiAttraversati;

        return $this;
    }

    public function getEventualiTimoriManifestati(): ?string
    {
        return $this->eventualiTimoriManifestati;
    }

    public function setEventualiTimoriManifestati(?string $eventualiTimoriManifestati): self
    {
        $this->eventualiTimoriManifestati = $eventualiTimoriManifestati;

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
