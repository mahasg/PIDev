<?php

namespace App\Entity;

use App\Repository\CinemaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CinemaRepository::class)
 */
class Cinema
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $num_sale;

    /**
     * @ORM\Column(type="date")
     */
    private $date_p;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_p;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSale(): ?string
    {
        return $this->num_sale;
    }

    public function setNumSale(string $num_sale): self
    {
        $this->num_sale = $num_sale;

        return $this;
    }

    public function getDateP(): ?\DateTimeInterface
    {
        return $this->date_p;
    }

    public function setDateP(\DateTimeInterface $date_p): self
    {
        $this->date_p = $date_p;

        return $this;
    }

    public function getHeureP(): ?\DateTimeInterface
    {
        return $this->heure_p;
    }

    public function setHeureP(\DateTimeInterface $heure_p): self
    {
        $this->heure_p = $heure_p;

        return $this;
    }
}
