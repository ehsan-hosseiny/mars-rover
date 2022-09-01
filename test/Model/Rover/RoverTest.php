<?php


namespace App\Test\Model\Rover;

use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;
use App\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function setUp():void
    {
        $this->Rover = new Rover();
    }

    /** @test  */
    public function acceptsRoverSetup()
    {
        $this->Rover->setSetup(new RoverSetup("3 3 ".Direction::EAST));
        $this->assertTrue($this->Rover->getSetup() instanceof RoverSetup);
    }

    /** @test  */
    public function executeCommands()
    {
        $this->Rover->setSetup(new RoverSetup("3 3 ".Direction::EAST));
        $this->Rover->setCommands((new CommandsInputParser("MMRMMRMRRM"))->getCommandsCollection());
        $this->Rover->execute();

        $this->expectOutputString("5 1 ".Direction::EAST);
        echo $this->Rover->getSetupAsString();
    }
}