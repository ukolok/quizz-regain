<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponsesRepository::class)
 */
class Reponses
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
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reponse;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reponses")
     */
    private $repondant;

    /**
     * @ORM\OneToMany(targetEntity=Resultats::class, mappedBy="totalreponse")
     */
    private $resultats;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
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

    public function getReponse(): ?Questions
    {
        return $this->reponse;
    }

    public function setReponse(?Questions $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getRepondant(): ?User
    {
        return $this->repondant;
    }

    public function setRepondant(?User $repondant): self
    {
        $this->repondant = $repondant;

        return $this;
    }

    /**
     * @return Collection|Resultats[]
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultats $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats[] = $resultat;
            $resultat->setTotalreponse($this);
        }

        return $this;
    }

    public function removeResultat(Resultats $resultat): self
    {
        if ($this->resultats->removeElement($resultat)) {
            // set the owning side to null (unless already changed)
            if ($resultat->getTotalreponse() === $this) {
                $resultat->setTotalreponse(null);
            }
        }

        return $this;
    }
}
