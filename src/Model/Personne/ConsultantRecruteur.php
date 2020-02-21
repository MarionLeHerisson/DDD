<?php

namespace PlanificationEntretien;

final class ConsultantRecruteur {

    private $nomComplet;
    private $specialite;
    private $experience;

    public function __construct(string $nomComplet, string $specialite, int $experience)
    {
        $this->nomComplet = $nomComplet;
        $this->specialite = $specialite;
        $this->experience = $experience;
    }

    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }
}
