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

    public function __construct($creneau, $salle, $candidat, $consultantRecruteur)
    {
        $this->id        = new EntretienID();
        $this->statut    = self::PLANIFIE;
        $this->creneau   = $creneau;
        $this->recruteur = $consultantRecruteur;
        $this->candidat  = $candidat;
        $this->salle     = $salle;
        $this->raison    = null;
    }

    public function getId(): EntretienID
    {
        return $this->id;
    }

    public function setId(EntretienID $id): void
    {
        $this->id = $id;
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

    public function setCreneau(Creneau $creneau): void
    {
        $this->creneau = $creneau;
    }

    public function getRecruteur(): ConsultantRecruteur
    {
        return $this->recruteur;
    }

    public function setRecruteur(ConsultantRecruteur $recruteur): void
    {
        $this->recruteur = $recruteur;
    }

    public function getCandidat(): Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(Candidat $candidat): void
    {
        $this->candidat = $candidat;
    }

    public function getRaison(): string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): void
    {
        $this->raison = $raison;
    }
}