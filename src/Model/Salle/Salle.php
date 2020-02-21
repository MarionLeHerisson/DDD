<?php

namespace PlanificationEntretien;

class Salle {
    private $name;
    private $capacite;

    public function __construct(string $name, int $capacite)
    {
        $this->name = $name;
        $this->capacite = $capacite;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapacite(): int
    {
        return $this->capacite;
    }
}