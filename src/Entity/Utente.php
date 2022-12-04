<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\UtenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UtenteRepository::class)
 * @ApiResource(
 *     subresourceOperations={
 *     "utente_cartella_sociales_get_subresource"={
 *          "method"="GET",
 *          "normalization_context"={"groups"={"foobar"}}
 *          }
 *     },
 *     normalizationContext={"groups"={"utente"}, "skip_null_values" = false},
 *     denormalizationContext={"groups"={"utente"}},
 * )
 */
class Utente implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"utente"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups ({"utente"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups ({"utente"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=UtenteCartellaSociale::class, mappedBy="utente")
     * @ApiSubresource
     *
     */
    private $utenteCartellaSociales;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"utente"})
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"utente"})
     */
    private $cognome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"utente"})
     */
    private $telefono;

    public function __construct()
    {
        $this->utenteCartellaSociales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, UtenteCartellaSociale>
     */
    public function getUtenteCartellaSociales(): Collection
    {
        return $this->utenteCartellaSociales;
    }

    public function addUtenteCartellaSociale(UtenteCartellaSociale $utenteCartellaSociale): self
    {
        if (!$this->utenteCartellaSociales->contains($utenteCartellaSociale)) {
            $this->utenteCartellaSociales[] = $utenteCartellaSociale;
            $utenteCartellaSociale->setUtente($this);
        }

        return $this;
    }

    public function removeUtenteCartellaSociale(UtenteCartellaSociale $utenteCartellaSociale): self
    {
        if ($this->utenteCartellaSociales->removeElement($utenteCartellaSociale)) {
            // set the owning side to null (unless already changed)
            if ($utenteCartellaSociale->getUtente() === $this) {
                $utenteCartellaSociale->setUtente(null);
            }
        }

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): self
    {
        $this->cognome = $cognome;

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
}
