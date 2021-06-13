<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
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
    private $emprunt;

    /**
     * @ORM\OneToMany(targetEntity=Emprunteur::class, mappedBy="emprunt")
     */
    private $emprunteurs;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="emprunt")
     */
    private $livres;

    /**
     * @ORM\ManyToOne(targetEntity=Emprunt::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emprunteur;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="emprunteur")
     */
    private $emprunts;

    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livre;

    public function __construct()
    {
        $this->emprunteurs = new ArrayCollection();
        $this->livres = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmprunt(): ?string
    {
        return $this->emprunt;
    }

    public function setEmprunt(string $emprunt): self
    {
        $this->emprunt = $emprunt;

        return $this;
    }

    /**
     * @return Collection|Emprunteur[]
     */
    public function getEmprunteurs(): Collection
    {
        return $this->emprunteurs;
    }

    public function addEmprunteur(Emprunteur $emprunteur): self
    {
        if (!$this->emprunteurs->contains($emprunteur)) {
            $this->emprunteurs[] = $emprunteur;
            $emprunteur->setEmprunt($this);
        }

        return $this;
    }

    public function removeEmprunteur(Emprunteur $emprunteur): self
    {
        if ($this->emprunteurs->removeElement($emprunteur)) {
            // set the owning side to null (unless already changed)
            if ($emprunteur->getEmprunt() === $this) {
                $emprunteur->setEmprunt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setEmprunt($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getEmprunt() === $this) {
                $livre->setEmprunt(null);
            }
        }

        return $this;
    }

    public function getEmprunteur(): ?self
    {
        return $this->emprunteur;
    }

    public function setEmprunteur(?self $emprunteur): self
    {
        $this->emprunteur = $emprunteur;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(self $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->setEmprunteur($this);
        }

        return $this;
    }

    public function removeEmprunt(self $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getEmprunteur() === $this) {
                $emprunt->setEmprunteur(null);
            }
        }

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }
}
