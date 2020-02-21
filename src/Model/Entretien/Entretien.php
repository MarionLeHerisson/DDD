<?php

namespace PlanificationEntretien;

class Entretien
{
    const ANNULE   = 'Annulé';
    const CONFIRME = 'Confirmé';
    const PLANIFIE = 'Planifié';

    private $id;
    private $statut;
    private $creneau;
    private $recruteur;
    private $candidat;
    private $salle;
    private $raison;

    public function __construct(Creneau $creneau, Salle $salle, Candidat $candidat, ConsultantRecruteur $consultantRecruteur)
    {
        $salle->reserverSalle($creneau);
        $consultantRecruteur->reserverConsultantRecruteur($creneau);

        $this->id        = new EntretienID();
        $this->statut    = self::PLANIFIE;
        $this->creneau   = $creneau;
        $this->recruteur = $consultantRecruteur;
        $this->candidat  = $candidat;
        $this->salle     = $salle;
        $this->raison    = null;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getCreneau(): Creneau
    {
        return $this->creneau;
    }

    public function getRecruteur(): ConsultantRecruteur
    {
        return $this->recruteur;
    }

    public function getCandidat(): Candidat
    {
        return $this->candidat;
    }

    public function setRaison(string $raison): void
    {
        $this->raison = $raison;
    }

    public function libererRecruteur()
    {
        $this->recruteur->libererCreneau($this->creneau);
    }

    public function libererSalle()
    {
        $this->salle->libererCreneau($this->creneau);
    }
}