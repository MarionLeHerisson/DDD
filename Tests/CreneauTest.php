<?php

use DDD\Creneau;
use \PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Creneau.php";

class CreneauTest extends TestCase
{

    private $creneau;

    public function setUp(): void
    {
        $this->creneau = new Creneau(1582450200, 2);    // 1582450200 = Sunday, February 23, 2020 10:30:00 AM
    }

    // début < fin
    public function testHeure() {
        self::assertTrue($this->creneau->getHeureDebut() < $this->creneau->getHeureFin());
    }

    public function testDate() {
        self::assertTrue($this->creneau->getDate() > date("d/m/Y"));
    }
}