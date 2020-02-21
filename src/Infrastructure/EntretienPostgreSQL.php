<?php

namespace PlanificationEntretien;

// For PHPUnit
require __DIR__ . "/../Model/Entretien/Entretiens.php";

class EntretienPostgreSQL implements Entretiens {

    private $entretiens = [];

    public function findAll(): array
    {
        return $this->entretiens;
    }

    public function add(Entretien $entretien)
    {
        $this->entretiens[] = $entretien;
    }

    public function findByStatut(string $statut): ?Entretien
    {
        foreach ($this->entretiens as $entretien) {
            if ($entretien->getStatut() == $statut) {
                return $entretien;
            }
        }

        return null;
    }

    public function findByCreneau(Creneau $creneau): ?Entretien
    {
       foreach ($this->entretiens as $entretien) {
           if ($entretien->getCreneau()->isEqual($creneau)) {
               return $entretien;
           }
       }

       return null;
    }

    public function findByRecruteur(ConsultantRecruteur $consultantRecruteur): ?Entretien
    {
        foreach ($this->entretiens as $entretien) {
            if ($entretien->getConsultantRecruteur()->isEqual($consultantRecruteur)) {
                return $entretien;
            }
        }

        return null;
    }

    public function findByCandidat(Candidat $candidat): ?Entretien
    {
        foreach ($this->entretiens as $entretien) {
            if ($entretien->getCandidat()->isEqual($candidat)) {
                return $entretien;
            }
        }

        return null;
    }
}