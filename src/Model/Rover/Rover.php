<?php

namespace App\Model\Rover;

use App\Command\CommandsCollection;

class Rover
{
    private object $Setup,$Commands;

    public function getSetup(): RoverSetup
    {
        return $this->Setup;
    }

    /**
     * @param CommandsCollection $Commands
     */
    public function setCommands(CommandsCollection $Commands):void
    {
        $this->Commands = $Commands;
    }

    /**
     * @param RoverSetup $RoverSetup
     */
    public function setSetup(RoverSetup $RoverSetup):void
    {
        $this->Setup = $RoverSetup;
    }

    public function execute():void
    {
        $Iterator = $this->Commands->getIterator();
        $Iterator->rewind();
        while ($Iterator->valid()) {
            $Command = $Iterator->current();
            $Command->execute($this);
            $Iterator->next();
        }
    }

    /**
     * @return string
     */
    public function getSetupAsString():string
    {
        return $this->Setup->toString();
    }


}
