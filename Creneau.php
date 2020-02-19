<?php

namespace DDD;

class Creneau {

    private $date;
    private $heureDebut;
    private $heureFin;

    /**
     * @return false|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param false|string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return false|string
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * @param false|string $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @return false|int|string
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @param false|int|string $heureFin
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;
    }

    public function __construct($dateTime, $duree)
    {
        $this->heureDebut = gmdate("H:i:s", $dateTime);
        $this->date = gmdate("d/m/Y", $dateTime);
        $this->heureFin = strtotime('+'.$duree.' hours', strtotime($this->heureDebut));
    }
}
