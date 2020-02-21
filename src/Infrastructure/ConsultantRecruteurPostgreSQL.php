<?php

namespace PlanificationEntretien;

// For PHPUnit :(
require __DIR__ . "/../Model/Personne/ConsultantsRecruteurs.php";
require __DIR__ . "/../Model/Personne/ConsultantRecruteur.php";

class ConsultantRecruteurPostgreSQL implements ConsultantsRecruteurs {

    private $consultantsRecruteurs = [];

    // Just here to add fake data
    public function __construct()
    {
        $this->add(new ConsultantRecruteur('Anatole Zhâ','CacheObjectScript',1));
        $this->add(new ConsultantRecruteur('Allam Hadji', 'PHP', 2));
        $this->add(new ConsultantRecruteur('Alexandre Hascour', 'JS', 12));
    }

    public function findAll(): array
    {
        return $this->consultantsRecruteurs;
    }

    public function add(ConsultantRecruteur $consultantRecruteur)
    {
        $this->consultantsRecruteurs[$consultantRecruteur->getNomComplet()] = $consultantRecruteur;
    }

    public function remove(ConsultantRecruteur $consultantRecruteur)
    {
        unset($this->consultantsRecruteurs[$consultantRecruteur->getNomComplet()]);
    }

    public function findByNomComplet(array $consultantsRecruteurs, string $nomComplet): ?ConsultantRecruteur
    {
        return isset($consultantsRecruteurs[$nomComplet]) ? $consultantsRecruteurs[$nomComplet] : null;
    }

    public function findBySpecialite(array $consultantsRecruteurs, string $specialite): ?ConsultantRecruteur
    {
        foreach ($consultantsRecruteurs as $cr) {
            if ($cr->getSpecialite() == $specialite) {
                return $cr;
            }
        }

        return null;
    }

    public function findByExperience(array $consultantsRecruteurs, int $experience): ?ConsultantRecruteur
    {
        foreach ($consultantsRecruteurs as $cr) {
            if ($cr->getExperience() >= $experience) {
                return $cr;
            }
        }

        return null;
    }

    public function findByCreneau(Creneau $creneau): array
    {
        $acc = [];

        foreach ($this->findAll() as $consultantRecruteur) {
            if (!in_array($creneau, $consultantRecruteur->getIndisponibilites())) {
                $acc[] = $consultantRecruteur;
            }
        }

        return $acc;
    }

    public function findBySpecialiteAndExperience(array $consultantsRecruteurs, string $specialite, int $experience): ?ConsultantRecruteur
    {
        foreach ($consultantsRecruteurs as $cr) {
            if ($cr->getExperience() >= $experience && $cr->getSpecialite() == $specialite) {
                return $cr;
            }
        }

        return null;
    }
}