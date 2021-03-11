<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;





/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class employe
{


    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="champs obligatoire")
     * @Assert\Length(min=3,max=3)
     */
    public $idemp;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="champs obligatoire")
     */
    public $nomemp;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="champs obligatoire")
     */
    public $prenomemp;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="champs obligatoire")
     * @Assert\Length(min=8,max=8)
     */
    public $numtelemp;

    /**
     * @ORM\Column(type="string", length=100)
     *  @Assert\NotBlank(message="champs obligatoire")
     * @Assert\Email(message="adresse mail non vallide")
     */
    public $adresseemp;

    /**
     * @ORM\OneToMany(targetEntity=Conge::class, mappedBy="employe")
     */
    public $conges;

    public function __construct()
    {
        $this->conges = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->idemp;
    }

    public function getIdEmploye(): ?int
    {
        return $this->idemp;
    }

    public function setIdEmploye(int $idemp): self
    {
        $this->idemp = $idemp;

        return $this;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nomemp;
    }

    public function setNomEmploye(string $nomemp): self
    {
        $this->nomemp = $nomemp;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenomemp;
    }

    public function setPrenomEmploye(string $prenomemp): self
    {
        $this->prenomemp = $prenomemp;

        return $this;
    }

    public function getNumTelEmploye(): ?int
    {
        return $this->numtelemp;
    }

    public function setNumTelEmploye(int $numtelemp): self
    {
        $this->numtelemp = $numtelemp;

        return $this;
    }

    public function getAdresseEmploye(): ?string
    {
        return $this->adresseemp;
    }

    public function setAdresseEmploye(string $adresseemp): self
    {
        $this->adresseemp = $adresseemp;

        return $this;
    }

    /**
     * @return Collection|Conge[]
     */
    public function getConges(): Collection
    {
        return $this->conges;
    }

    public function addConge(Conge $conge): self
    {
        if (!$this->conges->contains($conge)) {
            $this->conges[] = $conge;
            $conge->setEmploye($this);
        }

        return $this;
    }

    public function removeConge(Conge $conge): self
    {
        if ($this->conges->removeElement($conge)) {
            // set the owning side to null (unless already changed)
            if ($conge->getEmploye() === $this) {
                $conge->setEmploye(null);
            }
        }

        return $this;
    }


    public function __toString(): ?string
    {
        // TODO: Implement __toString() method.
        return $this->idemp;

    }



}
