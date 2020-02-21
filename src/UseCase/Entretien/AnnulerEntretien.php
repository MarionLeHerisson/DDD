<?php

namespace PlanificationEntretien;

class AnnulerEntretien
{
    public function annuler(Entretien $entretien, string $raison)
    {
        $entretien->setStatut(Entretien::ANNULE);
        $entretien->setRaison($raison);
    }
}