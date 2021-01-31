<?php

namespace App\Entity;

use App\Repository\ResultatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultatsRepository::class)
 */
class Resultats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="resultats")
     */
    private $totaluser;

    /**
     * @ORM\ManyToOne(targetEntity=Reponses::class, inversedBy="resultats")
     */
    private $totalreponse;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="resultats")
     */
    private $totalquestion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idusersection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $questionid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $answerid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sectionid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getTotaluser(): ?User
    {
        return $this->totaluser;
    }

    public function setTotaluser(?User $totaluser): self
    {
        $this->totaluser = $totaluser;

        return $this;
    }

    public function getTotalreponse(): ?Reponses
    {
        return $this->totalreponse;
    }

    public function setTotalreponse(?Reponses $totalreponse): self
    {
        $this->totalreponse = $totalreponse;

        return $this;
    }

    public function getTotalquestion(): ?Questions
    {
        return $this->totalquestion;
    }

    public function setTotalquestion(?Questions $totalquestion): self
    {
        $this->totalquestion = $totalquestion;

        return $this;
    }

    public function getIdusersection(): ?string
    {
        return $this->idusersection;
    }

    public function setIdusersection(string $idusersection): self
    {
        $this->idusersection = $idusersection;

        return $this;
    }

    public function getUserid(): ?string
    {
        return $this->userid;
    }

    public function setUserid(string $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getQuestionid(): ?string
    {
        return $this->questionid;
    }

    public function setQuestionid(string $questionid): self
    {
        $this->questionid = $questionid;

        return $this;
    }

    public function getAnswerid(): ?string
    {
        return $this->answerid;
    }

    public function setAnswerid(string $answerid): self
    {
        $this->answerid = $answerid;

        return $this;
    }

    public function getSectionid(): ?string
    {
        return $this->sectionid;
    }

    public function setSectionid(string $sectionid): self
    {
        $this->sectionid = $sectionid;

        return $this;
    }
}
