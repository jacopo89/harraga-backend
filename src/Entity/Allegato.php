<?php

namespace App\Entity;

use App\Repository\AllegatoRepository;
use Doctrine\ORM\Mapping as ORM;
use FileHandler\Bundle\FileHandlerBundle\Model\AbstractFile;

/**
 * @ORM\Entity(repositoryClass=AllegatoRepository::class)
 */
class Allegato extends AbstractFile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return "allegato";
    }
}
