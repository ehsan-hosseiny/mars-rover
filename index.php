<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Rover\RoverSquad;
use App\Model\Coordinate\Coordinate;
use App\Model\Rover\RoverSetup;
use App\Model\Rover\Rover;
use App\Service\CommandsInputParser;
use App\Model\Plateau\Plateau;

if (STDIN) {
    $plateauInputLine = fgets(STDIN);
    $plateauBorders = explode(" ", $plateauInputLine);
    $Coordinate = new Coordinate(intval($plateauBorders[0]), intval($plateauBorders[1]));
    $Plateau = new Plateau($Coordinate);

    $RoverSquad = new RoverSquad();
    $inputCommandNumber = 0;
    $squadCounter = 0;

    while (($input = fgets(STDIN)) !== false) {
        if ($inputCommandNumber == 0) {
            if ($RoverSquad->offsetExists($squadCounter) == false) {
                $Rover = new Rover();
                $Rover->setSetup(new RoverSetup($input));
                $RoverSquad->offsetSet($squadCounter, $Rover);
            }
            $inputCommandNumber++;
        } elseif ($inputCommandNumber == 1 && $RoverSquad->offsetExists($squadCounter)) {
            $Rover = $RoverSquad->offsetGet($squadCounter);
            $Rover->setCommands((new CommandsInputParser($input))->getCommandsCollection());
            $inputCommandNumber = 0;
            $squadCounter++;
        }
    }

    $RoverSquad->execute();
    echo $RoverSquad->getRoversSetupAsString();
}
