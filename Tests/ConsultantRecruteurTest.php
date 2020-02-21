<?php

use \PHPUnit\Framework\TestCase;
use PlanificationEntretien\ConsultantRecruteurPostgreSQL;
use PlanificationEntretien\ConsultantRecruteur;

class ConsultantRecruteurTest extends TestCase {

    private $repository;

    public function setUp(): void
    {
        $this->repository = new ConsultantRecruteurPostgreSQL();
    }

    public function testFindByNomComplet() {
        $cr = $this->repository->findByNomComplet($this->repository->findAll(), 'Anatole Zhâ');
        $this->assertEquals('Anatole Zhâ', $cr->getNomComplet());
    }

    public function testDontFindByNomComplet() {
        $cr = $this->repository->findByNomComplet($this->repository->findAll(), 'Ce nom n existe pas !');
        $this->assertNull($cr);
    }

    public function testFindBySpecialite() {
        $cr = $this->repository->findBySpecialite($this->repository->findAll(), 'PHP');
        $this->assertEquals('Allam Hadji', $cr->getNomComplet());
    }

    public function testFindNewConsultantBySpecialite() {
        $this->repository->add(new ConsultantRecruteur('Robin Saint Georges', 'SQL', 8));
        $cr = $this->repository->findBySpecialite($this->repository->findAll(), 'SQL');
        $this->assertEquals('Robin Saint Georges', $cr->getNomComplet());
    }

    public function testFindByExperience() {
        $cr = $this->repository->findByExperience($this->repository->findAll(), 10);
        $this->assertEquals('Alexandre Hascour', $cr->getNomComplet());
    }

    public function testFindBySpecialiteAndExperience() {
        $cr = $this->repository->findBySpecialiteAndExperience($this->repository->findAll(), 'JS', 10);
        $this->assertEquals('Alexandre Hascour', $cr->getNomComplet());
    }
}