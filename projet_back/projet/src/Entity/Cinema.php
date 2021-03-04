<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinema
 *
 * @ORM\Table(name="cinema")
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
     * @var string
     *
     * @ORM\Column(name="num_sale", type="string", length=10, nullable=false)
     */
    private $numSale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_p", type="date", nullable=false)
     */
    private $dateP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_p", type="time", nullable=false)
     */
    private $heureP;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSale(): ?string
    {
        return $this->numSale;
    }

    public function setNumSale(string $numSale): self
    {
        $this->numSale = $numSale;

        return $this;
    }

    public function getDateP(): ?\DateTimeInterface
    {
        return $this->dateP;
    }

    public function setDateP(\DateTimeInterface $dateP): self
    {
        $this->dateP = $dateP;

        return $this;
    }

    public function getHeureP(): ?\DateTimeInterface
    {
        return $this->heureP;
    }

    public function setHeureP(\DateTimeInterface $heureP): self
    {
        $this->heureP = $heureP;

        return $this;
    }


}
