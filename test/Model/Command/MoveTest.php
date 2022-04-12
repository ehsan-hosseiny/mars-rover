<?php

declare(strict_types=1);

namespace App\Test\Model\Command;

use App\Command\CommandsCollection;
use App\Model\Direction\Direction;
use App\Model\Rover\Rover;
use App\Model\Rover\RoverSetup;
use App\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    /** @test  */
    public function canMoveCorrectly()
    {
        $Move = (new CommandFactory())->createCommand(CommandFactory::MOVE);
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append($Move);

        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));
        $Rover->setCommands($CommandCollection);
        $Rover->execute();

        $this->expectOutputString("1 0 S");
        echo $Rover->getSetupAsString();
    }
}