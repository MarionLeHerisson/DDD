<?php

namespace PlanificationEntretien;

class PlanifierEntretien
{
    public static function planifierEntretien($creneau, $candidat): Entretien
    {
        $consultantRecruteur = ConsultantRecruteur::trouverRecruteur($candidat, $creneau);
        $salle = Salle::trouverSalle(2, $creneau);

        $entretien = new Entretien($creneau, $salle, $candidat, $consultantRecruteur);
        $entretiens = new EntretienPostgreSQL();

        $entretiens->add($entretien);
        return $entretien;
    }
}