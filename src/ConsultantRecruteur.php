<?php

namespace PlanificationEntretien;

final class ConsultantRecruteur {

    private $nomComplet;

    public function __construct()
    {
        $this->nomComplet = $this->trouverRecruteur();
    }

    private function trouverRecruteur() {
        return 'Marion Hurteau';
    }
}
