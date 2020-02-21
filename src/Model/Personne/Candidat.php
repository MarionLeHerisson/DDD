<?php

namespace PlanificationEntretien;

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

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }
}