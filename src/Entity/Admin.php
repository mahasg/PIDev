<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 * @UniqueEntity(fields={"idadmin"}, message="There is already an account with this idadmin")
 */
class Admin implements UserInterface
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $idadmin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emailadmin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pwdadmin;


    public function getIdadmin(): ?int
    {
        return $this->idadmin;
    }

    public function setIdadmin(int $idadmin): self
    {
        $this->idadmin = $idadmin;

        return $this;
    }

    public function getEmailadmin(): ?string
    {
        return $this->emailadmin;
    }

    public function setEmailadmin(string $emailadmin): self
    {
        $this->emailadmin = $emailadmin;

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function getPassword()
    {

    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->idadmin;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getPwdadmin(): ?string
    {
        return $this->pwdadmin;
    }

    public function setPwdadmin(string $pwdadmin): self
    {
        $this->pwdadmin = $pwdadmin;

        return $this;
    }
}
