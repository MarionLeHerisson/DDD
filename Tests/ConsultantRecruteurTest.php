<?php

use \PHPUnit\Framework\TestCase;
use PlanificationEntretien\ConsultantRecruteurPostgreSQL;
use PlanificationEntretien\ConsultantRecruteur;

//require __DIR__ . "/../src/Model/Personne/ConsultantRecruteur.php";
//require __DIR__ . "/../src/Infrastructure/ConsultantRecruteurPostgreSQL.php";

class ConsultantRecruteurTest extends TestCase {

    private $repository;

    public function setUp(): void
    {
        $this->repository = new ConsultantRecruteurPostgreSQL();
    }

    public function testFindByNomComplet() {
        $cr = $this->repository->findByNomComplet('Anatole Zhâ');
        $this->assertEquals('Anatole Zhâ', $cr->getNomComplet());
    }

    public function testDontFindByNomComplet() {
        $cr = $this->repository->findByNomComplet('Ce nom n existe pas !');
        $this->assertNull($cr);
    }

    public function testFindBySpecialite() {
        $cr = $this->repository->findBySpecialite('PHP');
        $this->assertEquals('Allam Hadji', $cr->getNomComplet());
    }

    public function testFindNewComnsultantBySpecialite() {
        $this->repository->add(new ConsultantRecruteur('Robin Saint Georges', 'SQL', 8));
        $cr = $this->repository->findBySpecialite('SQL');
        $this->assertEquals('Robin Saint Georges', $cr->getNomComplet());
    }

    public function testFindByExperience() {
        $cr = $this->repository->findByExperience(10);
        $this->assertEquals('Alexandre Hascour', $cr->getNomComplet());
    }

    public function testFindBySpecialiteAndExperience() {
        $cr = $this->repository->findBySpecialiteAndExperience('JS', 10);
        $this->assertEquals('Alexandre Hascour', $cr->getNomComplet());
    }
}