<?php

namespace Genusshaus\App\Manager\Places;

class Manager
{
    protected $place;

    public function setPlace($place)
    {
        $this->place = $place;
    }

    public function getPlace()
    {
        return $this->place;
    }
}
