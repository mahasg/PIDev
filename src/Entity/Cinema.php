<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cinema
 *
 * @ORM\Table(name="cinema", indexes={@ORM\Index(name="IDX_D48304B499C2681F", columns={"Film_id"})})
 * @ORM\Entity
 */
class Cinema
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurep", type="time", nullable=false)
     */
    private $heurep;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr", type="integer", nullable=false)
     */
    private $num;

    /**
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Film_id", referencedColumnName="idfilm")
     * })
     */
    private $film;

    /**
     * @ORM\OneToMany(targetEntity=Equipement::class, mappedBy="cinema")
     */
    private $equipements;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeurep(): ?\DateTimeInterface
    {
        return $this->heurep;
    }

    public function setHeurep(\DateTimeInterface $heurep): self
    {
        $this->heurep = $heurep;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }
public function __toString():?string
{
    // TODO: Implement __toString() method.
    return $this->getNum();
}

/**
 * @return Collection|Equipement[]
 */
public function getEquipements(): Collection
{
    return $this->equipements;
}

public function addEquipement(Equipement $equipement): self
{
    if (!$this->equipements->contains($equipement)) {
        $this->equipements[] = $equipement;
        $equipement->setCinema($this);
    }

    return $this;
}

public function removeEquipement(Equipement $equipement): self
{
    if ($this->equipements->removeElement($equipement)) {
        // set the owning side to null (unless already changed)
        if ($equipement->getCinema() === $this) {
            $equipement->setCinema(null);
        }
    }

    return $this;
}

}
