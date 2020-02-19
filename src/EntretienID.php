<?php

namespace PlanificationEntretien;

final class EntretienID
{
    private $id;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }
}