<?php

namespace PlanificationEntretien;

class Salle {
    const DEFAULT_SALLE = 'A01';

    private $name;
    private $capacite;
    private $indisponibilites;

    public function __construct(string $name, int $capacite)
    {
        $this->name = $name;
        $this->capacite = $capacite;
        $this->indisponibilites = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapacite(): int
    {
        return $this->capacite;
    }

    public function getIndisponibilites(): array
    {
        return $this->indisponibilites;
    }

    public function isEqual(Salle $salle): bool
    {
        return ($this->getCapacite() == $salle->getCapacite() &&
            $this->getName() == $salle->getName());
    }

    public static function trouverSalle(int $capacite, Creneau $creneau): ?Salle
    {
        $repository = new SallePostgreSQL();
        $salles = $repository->findByCreneau($creneau);

        if (!$salles) {
            SallePostgreSQL::findByName($repository->findAll(), self::DEFAULT_SALLE);
        }
        return SallePostgreSQL::findByCapacite($salles, $capacite);
    }

    public function reserverSalle($creneau)
    {
        $this->indisponibilites[] = $creneau;
    }

    public function libererCreneau(Creneau $creneau)
    {
        unset($this->indisponibilites[array_search($creneau, $this->indisponibilites)]);
    }
}