<?php

namespace PlanificationEntretien;

interface Salles {
    public function findAll(): array;
    public function findByName(string $name): Salle;
    public function findByCapacite(int $capacite): Salle;
}