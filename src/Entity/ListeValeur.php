<?php

namespace App\Entity;

use App\Repository\ListeValeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeValeurRepository::class)
 */
class ListeValeur
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Questions::class, mappedBy="listeValeur")
     */
    private $listeValeur;

    public function __construct()
    {
        $this->listeValeur = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Questions[]
     */
    public function getListeValeur(): Collection
    {
        return $this->listeValeur;
    }

    public function addListeValeur(Questions $listeValeur): self
    {
        if (!$this->listeValeur->contains($listeValeur)) {
            $this->listeValeur[] = $listeValeur;
            $listeValeur->setListeValeur($this);
        }

        return $this;
    }

    public function removeListeValeur(Questions $listeValeur): self
    {
        if ($this->listeValeur->removeElement($listeValeur)) {
            // set the owning side to null (unless already changed)
            if ($listeValeur->getListeValeur() === $this) {
                $listeValeur->setListeValeur(null);
            }
        }

        return $this;
    }
}
