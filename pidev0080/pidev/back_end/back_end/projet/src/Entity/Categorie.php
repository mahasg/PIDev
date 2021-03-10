<?php

namespace App\Entity;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{

    /**
     * @var int
     *
     * @ORM\Column(name="idc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomc;




    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function setId(int $idc): self
    {
        $this->idc = $idc;

        return $this;
    }

    public function getNomc(): ?string
    {
        return $this->nomc;
    }

    public function setNomc(string $nomc): self
    {
        $this->nomc = $nomc;

        return $this;
    }

    public function __toString() {
        return $this->nomc;
    }

}
