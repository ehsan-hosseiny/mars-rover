<?php

namespace App\Command;

use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;

class TurnLeft extends Rotatable implements Command
{
    /**
     * @param Rover $Rover
     */
    public function execute(Rover $Rover): void
    {
        $CurrentSetup = $Rover->getSetup();
        $currentXPosition = $CurrentSetup->getCoordinate()->getX();
        $currentYPosition = $CurrentSetup->getCoordinate()->getY();
        $currentOrientation = $CurrentSetup->getDirection()->getOrientation();

        $newInputSetup = $currentXPosition . " " . $currentYPosition . " " . $this->rotateFrom($currentOrientation);
        $Rover->setSetup(new RoverSetup($newInputSetup));
    }

    /**
     * @param $currentDirection
     * @return string
     */
    protected function rotateFrom($currentDirection): string
    {
         return match ($currentDirection) {
             Direction::NORTH => Direction::WEST,
             Direction::WEST => Direction::SOUTH,
             Direction::SOUTH => Direction::EAST,
             Direction::EAST => Direction::NORTH,
        };
    }

}