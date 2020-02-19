<?php

namespace DDD;

use DDD\Creneau;
use DDD\EntretienID;

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
    private $raison;

    public function __construct($creneau, $recruteur, $candidat)
    {
        $this->id        = new EntretienID();
        $this->statut    = self::PLANIFIE;
        $this->creneau   = $creneau;
        $this->recruteur = $recruteur;
        $this->candidat  = $candidat;
        $this->raison    = null;
    }

    public function getId(): EntretienID
    {
        return $this->id;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getCreneau(): Creneau
    {
        return $this->creneau;
    }

    public function getRecruteur()
    {
        return $this->recruteur;
    }

    public function getCandidat()
    {
        return $this->candidat;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function confirmer()
    {
        if($this->statut != self::ANNULE) {
            $this->statut = self::CONFIRME;
        }
    }

    public function annuler(string $raison)
    {
        $this->statut = self::ANNULE;
        $this->raison = $raison;
    }
}