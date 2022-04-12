<?php

namespace App\Test\Model\Coordinate;

use App\Model\Coordinate\Coordinate;
use PHPUnit\Framework\TestCase;


class CoordinateTest extends TestCase
{
    /** @test  */
    public function canHandleInputReturningIntegerToXPosition()
    {
        $Coordinate = new Coordinate("2", "3");
        $this->assertSame(2, $Coordinate->getX());
    }

    /** @test  */
    public function canHandleInputReturningIntegerToYPosition()
    {
        $Coordinate = new Coordinate("2", "3");
        $this->assertSame(3, $Coordinate->getY());
    }
}