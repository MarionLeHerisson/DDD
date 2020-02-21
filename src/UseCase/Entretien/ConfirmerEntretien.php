<?php

namespace PlanificationEntretien;

class ConfirmerEntretien
{
    public static function confirmer(Entretien $entretien)
    {
        if($entretien->getStatut() != Entretien::ANNULE) {
            $entretien->setStatut(Entretien::CONFIRME);
        }
    }
}