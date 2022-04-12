<?php
declare(strict_types=1);

namespace App\Test\Model\Command;

use App\Command\CommandsCollection;
use App\Command\Move;
use App\Command\TurnLeft;
use App\Command\TurnRight;
use PHPUnit\Framework\TestCase;

class CommandCollectionTest extends TestCase
{
    /** @test  */
    public function isPossibleToAddOneCommand()
    {
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append(new Move());

        $this->expectOutputString("1");
        echo $CommandCollection->count();
    }

    /** @test  */
    public function isPossibleToAddMoreThanOneCommand()
    {
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append(new Move());
        $CommandCollection->append(new TurnLeft());
        $CommandCollection->append(new TurnRight());

        $this->expectOutputString("3");
        echo $CommandCollection->count();
    }
}