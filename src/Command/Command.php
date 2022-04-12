<?php

namespace App\Command;

use App\Model\Rover\Rover;

interface Command
{
    /**
     * @param Rover $Rover
     */
    public function execute(Rover $Rover): void;
}