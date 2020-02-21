<?php

namespace PlanificationEntretien;

interface Entretiens
{
    public function findAll();
    public function add(Entretien $entretien);
    public function findByStatut(string $statut): ?Entretien;
    public function findByCreneau(Creneau $creneau): ?Entretien;
    public function findByRecruteur(ConsultantRecruteur $consultantRecruteur): ?Entretien;
    public function findByCandidat(Candidat $candidat): ?Entretien;
}