<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserv
 *
 * @ORM\Table(name="reserv", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_35033C901645DEA9", columns={"reference_id"})})
 * @ORM\Entity
 */
class Reserv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var float
     *
     * @ORM\Column(name="frais", type="float", precision=10, scale=0, nullable=false)
     */
    public $frais;

    /**
     * @var \Demande
     *
     * @ORM\ManyToOne(targetEntity="Demande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Reference_id", referencedColumnName="id")
     * })
     */
    public $Client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrais(): ?float
    {
        return $this->frais;
    }

    public function setFrais(float $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getClient(): ?Demande
    {
        return $this->Client;
    }

    public function setClient(?Demande $Client): self
    {
        $this->Client = $Client;

        return $this;
    }


}
