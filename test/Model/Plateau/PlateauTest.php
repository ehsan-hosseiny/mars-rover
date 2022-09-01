<?php

namespace App\Test\Model\Plateau;

use App\Model\Coordinate\Coordinate;
use App\Model\Plateau\Plateau;
use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    /** @test  */
    public function haveMinCoordinateToXAxis()
    {
        $Coordinate = new Coordinate("3", "8");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(0, $Plateau->getMinBorders()->getX());
    }

    /** @test  */
    public function haveMinCoordinateToYAxis()
    {
        $Coordinate = new Coordinate("5", "7");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(0, $Plateau->getMinBorders()->getY());
    }

    /** @test  */
    public function haveMaxCoordinateToXAxis()
    {
        $Coordinate = new Coordinate("9", "35");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(9, $Plateau->getMaxBorders()->getX());
    }

    /** @test  */
    public function haveMaxCoordinateToYAxis()
    {
        $Coordinate = new Coordinate("27", "6");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(6, $Plateau->getMaxBorders()->getY());
    }
}