<?php

namespace App\Model\Rover;

use App\Model\Coordinate\Coordinate;
use App\Model\Direction\Direction;

class RoverSetup
{
    private object $Coordinate,$Direction;

    public function __construct(string $currentSetupInput)
    {
        $currentSetup = explode(" ", $currentSetupInput);
        $this->Coordinate = new Coordinate(intval($currentSetup[0]), intval($currentSetup[1]));
        $this->Direction = new Direction(trim($currentSetup[2]));
    }

    public function getCoordinate(): Coordinate
    {
        return $this->Coordinate;
    }

    public function getDirection(): Direction
    {
        return $this->Direction;
    }


    public function toString():string
    {
        return $this->Coordinate->getX() . " " . $this->Coordinate->getY() . " " . $this->Direction->getOrientation();
    }
}
