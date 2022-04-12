<?php

namespace App\Model\Rover;

class RoverSquad extends \ArrayObject
{
    public function execute(): void
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();
        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $Rover->execute();
            $Iterator->next();
        }
    }

    /**
     * @return string
     */
    public function getRoversSetupAsString():string
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();
        $setup = [];
        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $setup[] = $Rover->getSetupAsString();
            $Iterator->next();
        }
        return implode("\n", $setup);
    }
}
