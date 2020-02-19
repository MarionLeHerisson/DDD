<?php

use \PHPUnit\Framework\TestCase;
use DDD\Entretien;
require __DIR__ . "/../src/Entretien.php";
require __DIR__ . "/../src/EntretienID.php";

class EntretienTest extends TestCase
{
    public function testCreation() {
        $creneau = new \DDD\Creneau(1587634200, 1);
        $entretien = new Entretien($creneau, 'Nilsou', 'Mimi');

        self::assertEquals(Entretien::PLANIFIE, $entretien->getStatut());
    }

    public function testConfirmation() {
        $creneau = new \DDD\Creneau(1587634200, 1);
        $entretien = new Entretien($creneau, 'Nilsou', 'Mimi');

        $entretien->confirmer();

        self::assertEquals(Entretien::CONFIRME, $entretien->getStatut());
    }

    public function testAnnulation() {
        $creneau = new \DDD\Creneau(1587634200, 1);
        $entretien = new Entretien($creneau, 'Nilsou', 'Mimi');

        $entretien->annuler('Empêchement');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testConfirmerEntretienAnnule() {
        $creneau = new \DDD\Creneau(1587634200, 1);
        $entretien = new Entretien($creneau, 'Nilsou', 'Mimi');

        $entretien->annuler('Empêchement');
        $entretien->confirmer();

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testAnnulerEntretienConfirme() {
        $creneau = new \DDD\Creneau(1587634200, 1);
        $entretien = new Entretien($creneau, 'Nilsou', 'Mimi');

        $entretien->confirmer();
        $entretien->annuler('Empêchement');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }
}