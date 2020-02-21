<?php

namespace PlanificationEntretien;

class AnnulerEntretien
{
    public static function annuler(Entretien $entretien, string $raison)
    {
        $entretien->setStatut(Entretien::ANNULE);
        $entretien->libererRecruteur();
        $entretien->libererSalle();
        $entretien->setRaison($raison);
    }
}