<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RessourceRepository")
 */
class Ressource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $syn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dec;

    /**
     * @ORM\Column(type="integer")
     */
    private $designId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getCc(): ?string
    {
        return $this->cc;
    }

    public function setCc(string $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getEng(): ?string
    {
        return $this->eng;
    }

    public function setEng(string $eng): self
    {
        $this->eng = $eng;

        return $this;
    }

    public function getSyn(): ?string
    {
        return $this->syn;
    }

    public function setSyn(string $syn): self
    {
        $this->syn = $syn;

        return $this;
    }

    public function getAnc(): ?string
    {
        return $this->anc;
    }

    public function setAnc(string $anc): self
    {
        $this->anc = $anc;

        return $this;
    }

    public function getDec(): ?string
    {
        return $this->dec;
    }

    public function setDec(string $dec): self
    {
        $this->dec = $dec;

        return $this;
    }

    public function getDesignId(): ?int
    {
        return $this->designId;
    }

    public function setDesignId(int $designId): self
    {
        $this->designId = $designId;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
