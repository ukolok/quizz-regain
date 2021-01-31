<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $affichage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $valeurs;

    /**
     * @ORM\ManyToOne(targetEntity=Sections::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity=ListeAffichage::class, inversedBy="affichages")
     */
    private $listeAffichage;

    /**
     * @ORM\ManyToOne(targetEntity=ListeValeur::class, inversedBy="listeValeur")
     */
    private $listeValeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="reponse", orphanRemoval=true)
     */
    private $reponses;

    /**
     * @ORM\OneToMany(targetEntity=Resultats::class, mappedBy="totalquestion")
     */
    private $resultats;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderid;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
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

    public function getAffichage(): ?string
    {
        return $this->affichage;
    }

    public function setAffichage(string $affichage): self
    {
        $this->affichage = $affichage;

        return $this;
    }

    public function getRequis(): ?bool
    {
        return $this->requis;
    }

    public function setRequis(bool $requis): self
    {
        $this->requis = $requis;

        return $this;
    }

    public function getValeurs(): ?string
    {
        return $this->valeurs;
    }

    public function setValeurs(string $valeurs): self
    {
        $this->valeurs = $valeurs;

        return $this;
    }

    public function getSection(): ?Sections
    {
        return $this->section;
    }

    public function setSection(?Sections $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getListeAffichage(): ?ListeAffichage
    {
        return $this->listeAffichage;
    }

    public function setListeAffichage(?ListeAffichage $listeAffichage): self
    {
        $this->listeAffichage = $listeAffichage;

        return $this;
    }

    public function getListeValeur(): ?ListeValeur
    {
        return $this->listeValeur;
    }

    public function setListeValeur(?ListeValeur $listeValeur): self
    {
        $this->listeValeur = $listeValeur;

        return $this;
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
     * @return Collection|Reponses[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponses $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setReponse($this);
        }

        return $this;
    }

    public function removeReponse(Reponses $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getReponse() === $this) {
                $reponse->setReponse(null);
            }
        }

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
            $resultat->setTotalquestion($this);
        }

        return $this;
    }

    public function removeResultat(Resultats $resultat): self
    {
        if ($this->resultats->removeElement($resultat)) {
            // set the owning side to null (unless already changed)
            if ($resultat->getTotalquestion() === $this) {
                $resultat->setTotalquestion(null);
            }
        }

        return $this;
    }

    public function getOrderid(): ?int
    {
        return $this->orderid;
    }

    public function setOrderid(int $orderid): self
    {
        $this->orderid = $orderid;

        return $this;
    }
}
