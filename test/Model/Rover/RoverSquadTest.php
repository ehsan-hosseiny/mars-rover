<?php

declare(strict_types=1);

namespace App\Test\Model\Rover;

use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;
use App\Model\Rover\RoverSquad;
use App\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class RoverSquadTest extends TestCase
{
    public function setUp():void
    {
        $this->RoverSquad = new RoverSquad();
        $this->RoverOne = new Rover();
        $this->RoverOne->setSetup(new RoverSetup("1 2 N"));
        $this->RoverOne->setCommands((new CommandsInputParser("LMLMLMLMM"))->getCommandsCollection());

        $this->RoverTwo = new Rover();
        $this->RoverTwo->setSetup(new RoverSetup("3 3 ".Direction::EAST));
        $this->RoverTwo->setCommands((new CommandsInputParser("MMRMMRMRRM"))->getCommandsCollection());
    }

    /** @test  */
    public function isPossibleToAddRoverOne()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->assertTrue($this->RoverSquad->offsetGet(0) instanceof Rover);
    }

    /** @test  */
    public function squadRoverOutputIsCorrectWhenJustRoverOneIsOnSquad()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->RoverSquad->execute();

        $this->expectOutputString("1 3 ".Direction::NORTH);
        echo $this->RoverSquad->getRoversSetupAsString();
    }

    /** @test  */
    public function isPossibleToAddRoverTwo()
    {
        $this->RoverSquad->offsetSet(1, $this->RoverTwo);
        $this->assertTrue($this->RoverSquad->offsetGet(1) instanceof Rover);
    }

    /** @test  */
    public function squadRoverOutputIsCorrectWhenRoverOneAndRoverTwoIsOnSquad()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->RoverSquad->offsetSet(1, $this->RoverTwo);
        $this->RoverSquad->execute();
        $this->expectOutputString("1 3 ".Direction::NORTH."\n5 1 ".Direction::EAST);
        echo $this->RoverSquad->getRoversSetupAsString();
    }

}