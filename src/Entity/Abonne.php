<?php

namespace App\Entity;

use App\Repository\AbonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
Use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=AbonneRepository::class)
 * @UniqueEntity(
 *     fields={"mailabonne"},
 *     message= "L'email que vous avez indiqué est déja utilisé!")
 */
class Abonne implements UserInterface
{
    /**

     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nomabonne;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $prenomabonne;

    /**
     * @Assert\Email(
     *     message = "Vous devez saisir une adresse mail valide !"
     * )
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $mailabonne;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $datenaissabonne;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Length(
     *     max="8",
     *     min="8",
     *     exactMessage="Votre numéro de téléphone doit contenir 8 chiffres")
     */
    private $telephoneabonne;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage ="Minimum 8 caractères")
    */
    private $password;
    /**
     * @Assert\EqualTo(propertyPath="password",message= "Vous n'avez pas tapé le même mot de passe ")

     */
    public $confirm_password;

    /**
     * @ORM\OneToMany(targetEntity=Abonnement::class, mappedBy="abonne")
     */
    private $abonnements;



    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
    }








    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNomabonne(): ?string
    {
        return $this->nomabonne;
    }

    public function setNomabonne(string $nomabonne): self
    {
        $this->nomabonne = $nomabonne;

        return $this;
    }

    public function getPrenomabonne(): ?string
    {
        return $this->prenomabonne;
    }

    public function setPrenomabonne(string $prenomabonne): self
    {
        $this->prenomabonne = $prenomabonne;

        return $this;
    }

    public function getMailabonne(): ?string
    {
        return $this->mailabonne;
    }

    public function setMailabonne(string $mailabonne): self
    {
        $this->mailabonne = $mailabonne;

        return $this;
    }

    public function getDatenaissabonne(): ?\DateTimeInterface
    {
        return $this->datenaissabonne;
    }

    public function setDatenaissabonne(\DateTimeInterface $datenaissabonne): self
    {
        $this->datenaissabonne = $datenaissabonne;

        return $this;
    }

    public function getTelephoneabonne(): ?int
    {
        return $this->telephoneabonne;
    }

    public function setTelephoneabonne(int $telephoneabonne): self
    {
        $this->telephoneabonne = $telephoneabonne;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
    }

    public function getUsername()
    {
     }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Abonnement[]
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setAbonne($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getAbonne() === $this) {
                $abonnement->setAbonne(null);
            }
        }

        return $this;
    }
}
