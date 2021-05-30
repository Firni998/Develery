<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nev", type="text", length=100)
     */
    private $nev;

    /**
     * @ORM\Column(name="email", type="text", length=100)
     */
    private $email;

    /**
     * @ORM\Column(name="uzenet", type="text", length=255)
     */
    private $uzenet;


    /**
     * Get id
     *
     * @return int
     */

    public function getId() {
        return $this->id;
    }

    public function getNev() {
        return $this->nev;
    }

    public function setNev($nev) {
        $this->nev = $nev;
        
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        
    }

    public function getUzenet() {
        return $this->uzenet;
    }

    public function setUzenet($uzenet) {
        $this->uzenet = $uzenet;
        
    }
}
