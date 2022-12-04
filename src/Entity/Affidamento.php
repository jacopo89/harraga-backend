<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AffidamentoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AffidamentoRepository::class)
 */
class Affidamento
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
    private $dataVerbaleAffidamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $autoritaAffido;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $verbaleAffidamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"amministrativa"})
     */
    private $dataProvvedimentoAffidamento;

    /**
     * @ORM\OneToOne(targetEntity=Allegato::class, cascade={"persist", "remove"})
     * @Groups({"amministrativa"})
     */
    private $provvedimentoAffidamentoDefinitivo;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataVerbaleAffidamento(): ?string
    {
        return $this->dataVerbaleAffidamento;
    }

    public function setDataVerbaleAffidamento(?string $dataVerbaleAffidamento): self
    {
        $this->dataVerbaleAffidamento = $dataVerbaleAffidamento;

        return $this;
    }

    public function getAutoritaaAffido(): ?string
    {
        return $this->autoritaAffido;
    }

    public function setAutoritaAffido(?string $autoritaAffido): self
    {
        $this->autoritaAffido = $autoritaAffido;

        return $this;
    }

    public function getVerbaleAffidamento(): ?Allegato
    {
        return $this->verbaleAffidamento;
    }

    public function setVerbaleAffidamento(?Allegato $verbaleAffidamento): self
    {
        $this->verbaleAffidamento = $verbaleAffidamento;

        return $this;
    }

    public function getDataProvvedimentoAffidamento(): ?string
    {
        return $this->dataProvvedimentoAffidamento;
    }

    public function setDataProvvedimentoAffidamento(?string $dataProvvedimentoAffidamento): self
    {
        $this->dataProvvedimentoAffidamento = $dataProvvedimentoAffidamento;

        return $this;
    }

    public function getProvvedimentoAffidamentoDefinitivo(): ?Allegato
    {
        return $this->provvedimentoAffidamentoDefinitivo;
    }

    public function setProvvedimentoAffidamentoDefinitivo(?Allegato $provvedimentoAffidamentoDefinitivo): self
    {
        $this->provvedimentoAffidamentoDefinitivo = $provvedimentoAffidamentoDefinitivo;

        return $this;
    }
}
