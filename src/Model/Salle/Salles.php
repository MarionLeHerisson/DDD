<?php

namespace PlanificationEntretien;

interface Salles {
    public function findAll(): array;
    public static function findByName(array $salles, string $name): ?Salle;
    public static function findByCapacite(array $salles, int $capacite): ?Salle;
    public function findByCreneau(Creneau $creneau): array;
}