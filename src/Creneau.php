<?php

namespace DDD;

class Creneau {

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
}
