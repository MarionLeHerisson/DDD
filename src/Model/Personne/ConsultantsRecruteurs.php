<?php

namespace PlanificationEntretien;

interface ConsultantsRecruteurs
{
    public function findAll(): array;

    public function add(ConsultantRecruteur $consultantRecruteur);

    public function remove(ConsultantRecruteur $consultantRecruteur);

    public function findByNomComplet(array $consultantsRecruteurs, string $nomComplet): ?ConsultantRecruteur;

    public function findBySpecialite(array $consultantsRecruteurs, string $specialite): ?ConsultantRecruteur;

    public function findByExperience(array $consultantsRecruteurs, int $experience): ?ConsultantRecruteur;

    public function findByCreneau(Creneau $creneau): array;

    public function findBySpecialiteAndExperience(array $consultantsRecruteurs, string $specialite, int $experience): ?ConsultantRecruteur;
}