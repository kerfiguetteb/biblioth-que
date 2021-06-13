<?php

namespace App\Entity;

use App\Repository\EmprunteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmprunteurRepository::class)
 */
class Emprunteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emprunteur;

    /**
     * @ORM\JoinColumn(nullable=false)
     */
    private $emprunt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmprunteur(): ?string
    {
        return $this->emprunteur;
    }

    public function setEmprunteur(string $emprunteur): self
    {
        $this->emprunteur = $emprunteur;

        return $this;
    }

    public function getEmprunt(): ?Emprunt
    {
        return $this->emprunt;
    }

    public function setEmprunt(?Emprunt $emprunt): self
    {
        $this->emprunt = $emprunt;

        return $this;
    }
}
