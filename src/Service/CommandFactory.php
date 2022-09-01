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
        switch ($commandType) {
            case self::MOVE:
                return new Move();
                break;
            case self::TURN_RIGHT:
                return new TurnRight();
                break;
            case self::TURN_LEFT:
                return new TurnLeft();
                break;
            default:
                throw new \Exception("Invalid Command Type, given: " . $commandType);
        }
    }

}