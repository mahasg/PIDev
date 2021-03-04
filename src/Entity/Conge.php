<?php

namespace App\Entity;

use App\Repository\CongeRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity ;


/**
 * @ORM\Entity(repositoryClass=CongeRepository::class)
 */
class Conge
{


    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="champs obligatoire")
     * @Assert\Length(min=3,max=3)
     */
    public $idconge;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="champs obligatoire")
     * @Assert\Date()
     */
    public $dateconge;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="champs obligatoire")
     */
    public $motifconge;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="champs obligatoire")
     * @Assert\LessThanOrEqual(15)
     */
    public $nbjourconge;

    /**
     * @ORM\ManyToOne(targetEntity=employe::class, inversedBy="conges")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="idemp" )
     * @Assert\NotBlank(message="champs obligatoire")
     */
    private $employe;




    public function getIdConge(): ?int
    {
        return $this->idconge;
    }

    public function setIdConge(?int $idconge): self
    {
        $this->idconge = $idconge;

        return $this;
    }

    public function getDateConge(): ?DateTimeInterface
    {
        return $this->dateconge;
    }

    public function setDateConge(?DateTimeInterface $dateconge): self
    {
        $this->dateconge = $dateconge;

        return $this;
    }

    public function getMotifConge(): ?string
    {
        return $this->motifconge;
    }

    public function setMotifConge(?string $motifconge): self
    {
        $this->motifconge = $motifconge;

        return $this;
    }

    public function getNbJourConge(): ?int
    {
        return $this->nbjourconge;
    }

    public function setNbJourConge(?int $nbjourconge): self
    {
        $this->nbjourconge = $nbjourconge;

        return $this;
    }

    public function getEmploye(): ?employe
    {
        return $this->employe;
    }

    public function setEmploye(?employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }


}
