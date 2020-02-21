<?php

namespace PlanificationEntretien;

// For PHPUnit
require __DIR__ . "/../Model/Salle/Salles.php";

class SallePostgreSQL implements Salles {

    private $salles;

    public function __construct()
    {
        $this->salles = [
            new salle('A01', 12),
            new salle('A02', 1),
            new salle('A03', 3),
            new salle('A04', 72),
            new salle('A05', 102),
            new salle('A06', 2),
        ];
    }

    public function findAll(): array
    {
        return $this->salles;
    }

    public function findByName(string $name): Salle
    {
        foreach ($this->findAll() as $salle) {
            if ($salle->getName() == $name) {
                return $salle;
            }
        }
    }

    public function findByCapacite(int $capacite): Salle
    {
        foreach ($this->findAll() as $salle) {
            if ($salle->getCapacite() >= $capacite) {
                return $salle;
            }
        }
    }
}