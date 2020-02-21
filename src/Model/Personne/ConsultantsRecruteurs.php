<?php

namespace PlanificationEntretien;

interface ConsultantsRecruteurs
{
    public function findAll(): array;

    public function add(ConsultantRecruteur $consultantRecruteur);

    public function remove(ConsultantRecruteur $consultantRecruteur);

    public function findByNomComplet(string $nomComplet): ?ConsultantRecruteur;

    public function findBySpecialite(string $specialite): ?ConsultantRecruteur;

    public function findByExperience(int $experience): ?ConsultantRecruteur;

    public function findBySpecialiteAndExperience(string $specialite, int $experience): ConsultantRecruteur;
}