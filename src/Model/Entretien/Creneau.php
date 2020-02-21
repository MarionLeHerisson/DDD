<?php

namespace PlanificationEntretien;

final class Creneau {

    private $date;
    private $heureDebut;
    private $heureFin;

    public function __construct($dateTime, $duree)
    {
        $this->heureDebut = gmdate("H:i:s", $dateTime);
        $this->date = gmdate("d/m/Y", $dateTime);
        $this->heureFin = strtotime('+'.$duree.' hours', strtotime($this->heureDebut));
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getHeureDebut(): string
    {
        return $this->heureDebut;
    }

    public function getHeureFin(): string
    {
        return $this->heureFin;
    }

    public function isEqual(Creneau $creneau): bool
    {
        return ($this->getDate() == $creneau->getDate() &&
            $this->getHeureDebut() == $this->getHeureDebut() &&
            $this->getHeureFin() == $creneau->getHeureFin());
    }
}
