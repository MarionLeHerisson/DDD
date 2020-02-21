<?php

namespace PlanificationEntretien;

class EntretienPostgreSQL implements Entretiens {

    private $entretiens = [];

    public function findAll(): array
    {
        return $this->entretiens;
    }
}