<?php

declare(strict_types=1);

namespace App\Test\Model\Command;


use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;
use App\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class TurnRightTest extends TestCase
{
    /** @test  */
    public function canTurnRightCorrectly()
    {

        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));

        $TurnLeft = (new CommandFactory())->createCommand(CommandFactory::TURN_RIGHT);
        $TurnLeft->execute($Rover);

        $this->assertEquals(Direction::WEST, $Rover->getSetup()->getDirection()->getOrientation());
    }
}