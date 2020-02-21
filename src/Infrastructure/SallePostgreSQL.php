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

    public function addSalle(Salle $salle)
    {
        $this->salles[] = $salle;
    }

    public static function findByName(array $salles, string $name): ?Salle
    {
        foreach ($salles as $salle) {
            if ($salle->getName() == $name) {
                return $salle;
            }
        }

        return null;
    }

    public static function findByCapacite(array $salles, int $capacite): ?Salle
    {
        foreach ($salles as $salle) {
            if ($salle->getCapacite() >= $capacite) {
                return $salle;
            }
        }

        return null;
    }

    public function findByCreneau(Creneau $creneau): array
    {
        $acc = [];

        foreach ($this->findAll() as $salle) {
            if (!in_array($creneau, $salle->getIndisponibilites())) {
                $acc[] = $salle;
            }
        }

        return $acc;
    }
}