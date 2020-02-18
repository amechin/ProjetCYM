<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DureeRepository")
 */
class Duree
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
    private $duree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Correspondance", mappedBy="duree", orphanRemoval=true)
     */
    private $correspondances;

    public function __construct()
    {
        $this->correspondances = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Correspondance[]
     */
    public function getCorrespondances(): Collection
    {
        return $this->correspondances;
    }

    public function addCorrespondance(Correspondance $correspondance): self
    {
        if (!$this->correspondances->contains($correspondance)) {
            $this->correspondances[] = $correspondance;
            $correspondance->setDuree($this);
        }

        return $this;
    }

    public function removeCorrespondance(Correspondance $correspondance): self
    {
        if ($this->correspondances->contains($correspondance)) {
            $this->correspondances->removeElement($correspondance);
            // set the owning side to null (unless already changed)
            if ($correspondance->getDuree() === $this) {
                $correspondance->setDuree(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->duree;
    }
}
