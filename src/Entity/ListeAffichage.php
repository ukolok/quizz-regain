<?php

namespace App\Entity;

use App\Repository\ListeAffichageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeAffichageRepository::class)
 */
class ListeAffichage
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
     * @ORM\OneToMany(targetEntity=Questions::class, mappedBy="listeAffichage")
     */
    private $affichages;

    public function __construct()
    {
        $this->affichages = new ArrayCollection();
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
    public function getAffichages(): Collection
    {
        return $this->affichages;
    }

    public function addAffichage(Questions $affichage): self
    {
        if (!$this->affichages->contains($affichage)) {
            $this->affichages[] = $affichage;
            $affichage->setListeAffichage($this);
        }

        return $this;
    }

    public function removeAffichage(Questions $affichage): self
    {
        if ($this->affichages->removeElement($affichage)) {
            // set the owning side to null (unless already changed)
            if ($affichage->getListeAffichage() === $this) {
                $affichage->setListeAffichage(null);
            }
        }

        return $this;
    }
}
