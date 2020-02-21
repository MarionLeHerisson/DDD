<?php

use \PHPUnit\Framework\TestCase;
use PlanificationEntretien\AnnulerEntretien;
use PlanificationEntretien\Candidat;
use PlanificationEntretien\ConfirmerEntretien;
use PlanificationEntretien\Creneau;
use PlanificationEntretien\Entretien;
use PlanificationEntretien\PlanifierEntretien;
use PlanificationEntretien\Salle;

require __DIR__ . "/../src/Infrastructure/ConsultantRecruteurPostgreSQL.php";
require __DIR__ . "/../src/Infrastructure/EntretienPostgreSQL.php";
require __DIR__ . "/../src/Infrastructure/SallePostgreSQL.php";
require __DIR__ . "/../src/Model/Entretien/Entretien.php";
require __DIR__ . "/../src/Model/Entretien/EntretienID.php";
require __DIR__ . "/../src/Model/Personne/Candidat.php";
require __DIR__ . "/../src/Model/Salle/Salle.php";
require __DIR__ . "/../src/UseCase/Entretien/ConfirmerEntretien.php";
require __DIR__ . "/../src/UseCase/Entretien/PlanifierEntretien.php";
require __DIR__ . "/../src/UseCase/Entretien/AnnulerEntretien.php";

class EntretienTest extends TestCase
{
    const DATE  = 1587634200;    // 1587634200 = Thursday, April 23, 2020 9:30:00 AM
    const DUREE = 1;

    private $candidat;
    private $salle;
    private $creneau;

    protected function setUp(): void
    {
        $this->candidat = new Candidat('Marion', 'Hurteau', 'PHP', 1);
        $this->salle = new Salle('B12', 23);
        $this->creneau = new Creneau(self::DATE, self::DUREE);
    }

    public function testCreation() {

        $entretien = PlanifierEntretien::planifierEntretien($this->creneau, $this->candidat);

        self::assertEquals(Entretien::PLANIFIE, $entretien->getStatut());
    }

    public function testConfirmation() {
        $entretien = PlanifierEntretien::planifierEntretien($this->creneau, $this->candidat);

        ConfirmerEntretien::confirmer($entretien);

        self::assertEquals(Entretien::CONFIRME, $entretien->getStatut());
    }

    public function testAnnulation() {
        $entretien = PlanifierEntretien::planifierEntretien($this->creneau, $this->candidat);

        AnnulerEntretien::annuler($entretien, 'Empêchement');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testConfirmerEntretienAnnule() {
        $entretien = PlanifierEntretien::planifierEntretien($this->creneau, $this->candidat);

        AnnulerEntretien::annuler($entretien, 'Empêchement');
        ConfirmerEntretien::confirmer($entretien);

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }

    public function testAnnulerEntretienConfirme() {
        $entretien = PlanifierEntretien::planifierEntretien($this->creneau, $this->candidat);

        ConfirmerEntretien::confirmer($entretien);
        AnnulerEntretien::annuler($entretien, 'Empêchement');

        self::assertEquals(Entretien::ANNULE, $entretien->getStatut());
    }
}