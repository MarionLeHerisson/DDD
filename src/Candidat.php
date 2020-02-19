<?php

namespace PlanificationEntretien;

final class Candidat {

    private $nom;
    private $prenom;

    public function __construct(string $prenom, string $nom)
    {
        $this->nom    = $nom;
        $this->prenom = $prenom;
    }
}