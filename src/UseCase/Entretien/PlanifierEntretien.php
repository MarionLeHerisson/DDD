<?php

namespace PlanificationEntretien;

// For PHPUnit
require __DIR__ . "/../../Infrastructure/SallePostgreSQL.php";

class PlanifierEntretien
{
    public function planifierEntretien($creneau, $candidat)
    {
        $consultantRecruteur = $this->trouverRecruteur($candidat);
        $salle = $this->trouverSalle(2);
        $entretien = new Entretien($creneau, $salle, $candidat, $consultantRecruteur);

        return $entretien;
    }

    private function trouverRecruteur(Candidat $candidat): ConsultantRecruteur
    {
        // todo: dispo du CR
        $consultantsRecruteurs = new ConsultantRecruteurPostgreSQL();

        $consutantRecruteur = $consultantsRecruteurs->findBySpecialiteAndExperience(
                $candidat->getSpecialite(),
                $candidat->getExperience()
            );

        if (!$consutantRecruteur) {
            $consutantRecruteur = $consultantsRecruteurs->findBySpecialite($candidat->getSpecialite());
        }

        if (!$consutantRecruteur) {
            $consutantRecruteur = $consultantsRecruteurs->findByExperience($candidat->getExperience());
        }

        return $consutantRecruteur;
    }

    private function trouverSalle(int $capacite)
    {
        // todo: dispo salle
        $salles = new SallePostgreSQL();

        return $salles->findByCapacite($capacite);
    }
}