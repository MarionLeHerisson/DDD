<?php

namespace PlanificationEntretien;

class ConfirmerEntretien
{
    public function confirmer(Entretien $entretien)
    {
        if($entretien->getStatut() != Entretien::ANNULE) {
            $entretien->setStatut(Entretien::CONFIRME);
        }
    }
}