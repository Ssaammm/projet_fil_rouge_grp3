<?php

namespace App\Entity;

use App\Repository\ChiffreAffaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChiffreAffaireRepository::class)
 */
class ChiffreAffaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPetite;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbMoyen;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbGrande;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcPetite;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcMoyen;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcGrande;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalPetite;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalMoyen;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalGrande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPetite(): ?int
    {
        return $this->nbPetite;
    }

    public function setNbPetite(int $nbPetite): self
    {
        $this->nbPetite = $nbPetite;

        return $this;
    }

    public function getNbMoyen(): ?int
    {
        return $this->nbMoyen;
    }

    public function setNbMoyen(int $nbMoyen): self
    {
        $this->nbMoyen = $nbMoyen;

        return $this;
    }

    public function getNbGrande(): ?int
    {
        return $this->nbGrande;
    }

    public function setNbGrande(int $nbGrande): self
    {
        $this->nbGrande = $nbGrande;

        return $this;
    }

    public function getPourcPetite(): ?int
    {
        return $this->pourcPetite;
    }

    public function setPourcPetite(int $pourcPetite): self
    {
        $this->pourcPetite = $pourcPetite;

        return $this;
    }

    public function getPourcMoyen(): ?int
    {
        return $this->pourcMoyen;
    }

    public function setPourcMoyen(int $pourcMoyen): self
    {
        $this->pourcMoyen = $pourcMoyen;

        return $this;
    }

    public function getPourcGrande(): ?int
    {
        return $this->pourcGrande;
    }

    public function setPourcGrande(int $pourcGrande): self
    {
        $this->pourcGrande = $pourcGrande;

        return $this;
    }

    public function getTotalPetite(): ?int
    {
        return $this->totalPetite;
    }

    public function setTotalPetite(int $totalPetite): self
    {
        $this->totalPetite = $totalPetite;

        return $this;
    }

    public function getTotalMoyen(): ?int
    {
        return $this->totalMoyen;
    }

    public function setTotalMoyen(int $totalMoyen): self
    {
        $this->totalMoyen = $totalMoyen;

        return $this;
    }

    public function getTotalGrande(): ?int
    {
        return $this->totalGrande;
    }

    public function setTotalGrande(int $totalGrande): self
    {
        $this->totalGrande = $totalGrande;

        return $this;
    }
}
