<?php

declare(strict_types=1);

namespace App\Test\Model\Command;

use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;
use App\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class TurnLeftTest extends TestCase
{
    /** @test  */
    public function canTurnLefCorrectly()
    {
        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));
        $TurnLeft = (new CommandFactory())->createCommand(CommandFactory::TURN_LEFT);
        $TurnLeft->execute($Rover);
        $this->assertEquals(Direction::EAST, $Rover->getSetup()->getDirection()->getOrientation());
    }
}