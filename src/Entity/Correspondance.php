<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrespondanceRepository")
 */
class Correspondance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="correspondances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Carte", inversedBy="correspondances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Duree", inversedBy="correspondances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe", inversedBy="correspondances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupe;

    /**
     * @ORM\Column(type="integer")
     */
    private $exerciceId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCarte(): ?carte
    {
        return $this->carte;
    }

    public function setCarte(?carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    public function getDuree(): ?duree
    {
        return $this->duree;
    }

    public function setDuree(?duree $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getGroupe(): ?groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getExerciceId(): ?int
    {
        return $this->exerciceId;
    }

    public function setExerciceId(int $exerciceId): self
    {
        $this->exerciceId = $exerciceId;

        return $this;
    }
}
