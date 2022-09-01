<?php
declare(strict_types=1);

namespace App\Test\Service;

use App\Command\Move;
use App\Command\TurnLeft;
use App\Command\TurnRight;
use App\Model\Direction\Direction;
use App\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class CommandFactoryTest extends TestCase
{
    /** @test  */
    public function ifGiven_M_CommandMoveIsCreated()
    {
        $Move = (new CommandFactory())->createCommand(CommandFactory::MOVE);
        $this->assertTrue($Move instanceof Move);
    }

    /** @test  */
    public function ifGiven_R_CommandTurnRightIsCreated()
    {
        $TurnRight = (new CommandFactory())->createCommand(CommandFactory::TURN_RIGHT);
        $this->assertTrue($TurnRight instanceof TurnRight);
    }

    /** @test  */
    public function ifGiven_L_CommandTurnRightIsCreated()
    {
        $TurnLeft = (new CommandFactory())->createCommand(CommandFactory::TURN_LEFT);
        $this->assertTrue($TurnLeft instanceof TurnLeft);
    }

    /** @test  */
    public function ifGivenInvalidInputThrowsException()
    {
        $this->expectException(\Exception::class);
        (new CommandFactory())->createCommand(Direction::SOUTH);
    }
}