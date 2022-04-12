<?php

declare(strict_types=1);

namespace App\Test\Service;

use App\Command\CommandsCollection;
use App\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class CommandsInputParserTest extends TestCase
{
    /** @test  */
    public function canParseValidInputToCommandsCollection()
    {
        $Parser = new CommandsInputParser("MRMLMM");
        $this->assertTrue($Parser->getCommandsCollection() instanceof CommandsCollection);
    }
}