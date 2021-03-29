<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="IDX_CE606404C325A696", columns={"abonne_id"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idrec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrec;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=600, nullable=false)
     *  @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )

     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=200, nullable=false)
     */
    private $field;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datee", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datee = 'CURRENT_TIMESTAMP';

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank(message="champs obligatoire!")
     */
    private $rate;

    /**
     * @var \Abonne
     *
     * @ORM\ManyToOne(targetEntity="Abonne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="abonne_id", referencedColumnName="id")
     * })
     */
    private $abonne;

    public function getIdrec(): ?int
    {
        return $this->idrec;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getDatee()
    {
        return $this->datee;
    }

    public function setDatee(\DateTimeInterface $datee): self
    {
        $this->datee = $datee;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getAbonne(): ?Abonne
    {
        return $this->abonne;
    }

    public function setAbonne(?Abonne $abonne): self
    {
        $this->abonne = $abonne;

        return $this;
    }

}
