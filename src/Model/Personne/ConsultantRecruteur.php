<?php

namespace PlanificationEntretien;

use phpDocumentor\Reflection\Types\Boolean;

final class ConsultantRecruteur {

    const NOM_DIRECTEUR = 'Anatole Zhâ';

    private $nomComplet;
    private $specialite;
    private $experience;
    private $indisponibilites;

    public function __construct(string $nomComplet, string $specialite, int $experience)
    {
        $this->nomComplet = $nomComplet;
        $this->specialite = $specialite;
        $this->experience = $experience;
        $this->indisponibilites = [];
    }

    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getIndisponibilites(): array
    {
        return $this->indisponibilites;
    }

    public function reserverConsultantRecruteur($creneau)
    {
        $this->indisponibilites[] = $creneau;
    }

    public function isEqual(ConsultantRecruteur $consultantRecruteur): bool
    {
        return ($this->getNomComplet() == $consultantRecruteur->getNomComplet() &&
            $this->getSpecialite() == $consultantRecruteur->getSpecialite() &&
            $this->getExperience() == $consultantRecruteur->getExperience());
    }

    public static function trouverRecruteur(Candidat $candidat, Creneau $creneau): ConsultantRecruteur
    {
        $repository = new ConsultantRecruteurPostgreSQL();
        $consultantsRecruteurs = $repository->findByCreneau($creneau);

        $consultantRecruteur = $repository->findBySpecialiteAndExperience(
            $consultantsRecruteurs,
            $candidat->getSpecialite(),
            $candidat->getExperience()
        );

        if (!$consultantRecruteur) {
            $consultantRecruteur = $repository->findBySpecialite($consultantsRecruteurs, $candidat->getSpecialite());
        }

        if (!$consultantRecruteur) {
            $consultantRecruteur = $repository->findByExperience($consultantsRecruteurs, $candidat->getExperience());
        }

        if(!$consultantRecruteur) {
            $consultantRecruteur = $repository->findByNomComplet($consultantsRecruteurs, self::NOM_DIRECTEUR);
        }

        return $consultantRecruteur;
    }

    public function libererCreneau(Creneau $creneau)
    {
        unset($this->indisponibilites[array_search($creneau, $this->indisponibilites)]);
    }
}
