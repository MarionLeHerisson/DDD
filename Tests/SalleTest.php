<?php

use PlanificationEntretien\Salle;
use PlanificationEntretien\SallePostgreSQL;

use \PHPUnit\Framework\TestCase;
use PlanificationEntretien\Creneau;

class SalleTest extends TestCase
{
    private $salles;

    protected function setUp(): void
    {
        $this->salles = new SallePostgreSQL();
    }

    public function testCreation() {
        $salleCree = new Salle('B12', 14);
        $this->salles->addSalle($salleCree);

        $salleTrouvee = $this->salles->findByName($this->salles->findAll(), 'B12');
        self::assertTrue($salleTrouvee->isEqual($salleCree));
    }

    public function testTrouverSalle() {
        $creneau = new Creneau(1587634200, 2);
        $salle = Salle::trouverSalle(100, $creneau);

        self::assertTrue($salle->getName() == 'A05');
    }
}