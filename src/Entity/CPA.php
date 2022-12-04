<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CPARepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CPARepository::class)
 */
class CPA
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
    private $nome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $dataIngresso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"storia"})
     */
    private $dataUscita;

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

    public function getDataIngresso(): ?string
    {
        return $this->dataIngresso;
    }

    public function setDataIngresso(?string $dataIngresso): self
    {
        $this->dataIngresso = $dataIngresso;

        return $this;
    }

    public function getDataUscita(): ?string
    {
        return $this->dataUscita;
    }

    public function setDataUscita(?string $dataUscita): self
    {
        $this->dataUscita = $dataUscita;

        return $this;
    }
}
