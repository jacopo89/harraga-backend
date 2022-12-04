<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AllegatoRepository;
use Doctrine\ORM\Mapping as ORM;
use FileHandler\Bundle\FileHandlerBundle\Model\AbstractFile;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AllegatoRepository::class)
 */
class Allegato extends AbstractFile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"anagrafica", "amministrativa", "storia", "sanitaria", "file:read"})
     */
    protected int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return "allegato";
    }
}
