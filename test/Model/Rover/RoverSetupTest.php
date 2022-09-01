<?php

namespace App\Test\Model\Rover;

use App\Model\Coordinate\Coordinate;
use App\Model\Direction\Direction;
use App\Model\Rover\RoverSetup;
use PHPUnit\Framework\TestCase;

class RoverSetupTest extends TestCase
{
    /** @test  */
    public function parseInput()
    {
        $this->RoverSetup = new RoverSetup("3 3 ". Direction::EAST);
        $this->assertTrue(
            $this->RoverSetup->getCoordinate() instanceof Coordinate &&
            $this->RoverSetup->getDirection() instanceof Direction
        );
    }

    /** @test  */
    public function parseSetupToOutput()
    {
        $this->RoverSetup = new RoverSetup("3 3 ".Direction::EAST);
        $this->assertEquals("3 3 ".Direction::EAST, $this->RoverSetup->toString());
    }
}
