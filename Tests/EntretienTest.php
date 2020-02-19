<?php

use \PHPUnit\Framework\TestCase;
use DDD\Entretien;
use DDD\Creneau;
require __DIR__ . "/../src/Entretien.php";
require __DIR__ . "/../src/EntretienID.php";

class EntretienTest extends TestCase
{
    const DATE      = 1587634200;    // 1587634200 = Thursday, April 23, 2020 9:30:00 AM
    const DUREE     = 1;
    const RECRUTEUR = 'Nilsou';
    const CANDIDAT  = 'Mimi';

    public function testCreation() {
        $creneau = new Creneau(self::DATE, self::DUREE);
        $entretien = new Entretien($creneau, self::RECRUTEUR, self::CANDIDAT);

        self::assertEquals(Entretien::PLANIFIE, $entretien->getStatut());
    }

    public function testConfirmation() {
        $creneau = new Creneau(self::DATE, self::DUREE);
        $entretien = new Entretien($creneau, self::RECRUTEUR, self::CANDIDAT);

        $entretien->confirmer();

        self::assertEquals(Entretien::CONFIRME, $entretien->getStatut());
    }

    public function testAnnulation() {
        $creneau = new Creneau(self::DATE, self::DUREE);
        $entretien = new Entretien($creneau, self::RECRUTEUR, self::CANDIDAT);

        $entretien->annuler('Empêchement');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testConfirmerEntretienAnnule() {
        $creneau = new Creneau(self::DATE, self::DUREE);
        $entretien = new Entretien($creneau, self::RECRUTEUR, self::CANDIDAT);

        $entretien->annuler('Pas envie');
        $entretien->confirmer();

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testAnnulerEntretienConfirme() {
        $creneau = new Creneau(self::DATE, self::DUREE);
        $entretien = new Entretien($creneau, self::RECRUTEUR, self::CANDIDAT);

        $entretien->confirmer();
        $entretien->annuler('En retard');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }
}