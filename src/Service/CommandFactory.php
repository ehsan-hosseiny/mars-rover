<?php

namespace App\Service;

use App\Command\Command;
use App\Command\TurnRight;
use App\Command\Move;
use App\Command\TurnLeft;

class CommandFactory
{
    const MOVE = "M";
    const TURN_RIGHT = "R";
    const TURN_LEFT = "L";

    /**
     * @param string $commandType
     * @return Command
     * @throws \Exception
     */
    public function createCommand(string $commandType): Command
    {
        return match ($commandType) {
            self::MOVE => new Move(),
            self::TURN_RIGHT => new TurnRight(),
            self::TURN_LEFT => new TurnLeft(),
            default => throw new \Exception("Invalid Command Type, given: " . $commandType),
        };
    }

}