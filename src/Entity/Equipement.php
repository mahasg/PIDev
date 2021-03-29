<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Equipement
 *
 * @ORM\Table(name="equipement")
 * @ORM\Entity
 */
class Equipement
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
     * @var int
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nome;


    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="equipements")
     */
    private $resto;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dates", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dates = 'CURRENT_TIMESTAMP';

    /**
     * @ORM\ManyToOne(targetEntity=Cinema::class, inversedBy="equipements")
     */
    private $cinema;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function setRef(int $ref): self
    {
        $this->ref = $ref;

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


    public function getResto(): ?Categorie
    {
        return $this->resto;
    }

    public function setResto(?Categorie $resto): self
    {
        $this->resto = $resto;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDates()
    {
        return $this->dates;
    }

    public function setDates(\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }

    public function setCinema(?Cinema $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }



}
