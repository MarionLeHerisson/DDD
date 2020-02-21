<?php

namespace PlanificationEntretien;

use phpDocumentor\Reflection\Types\Boolean;

final class Candidat {

    private $nom;
    private $prenom;
    private $specialite;
    private $experience;

    public function __construct(string $prenom, string $nom, string $specialite, int $experience)
    {
        $this->nom        = $nom;
        $this->prenom     = $prenom;
        $this->specialite = $specialite;
        $this->experience = $experience;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function isEqual(Candidat $candidat): bool
    {
        return ($this->getNom() == $candidat->getNom() &&
            $this->getPrenom() == $candidat->getPrenom() &&
            $this->getExperience() == $candidat->getExperience() &&
            $this->getSpecialite() == $candidat->getSpecialite());
    }
}