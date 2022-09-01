<?php

namespace App\Service;

use App\Command\CommandsCollection;

class CommandsInputParser
{
    private object $CommandsCollection;

    /**
     * CommandsInputParser constructor.
     * @param string $commandsInput
     * @throws \Exception
     */
    public function __construct(string $commandsInput)
    {
        $CommandFactory = new CommandFactory();
        $this->CommandsCollection = new CommandsCollection();

        $commands = str_split(trim($commandsInput));
        foreach ($commands as $commandType) {
            $this->CommandsCollection->append(
                $CommandFactory->createCommand($commandType)
            );
        }
    }

    /**
     * @return CommandsCollection
     */
    public function getCommandsCollection(): CommandsCollection
    {
        return $this->CommandsCollection;
    }


}
