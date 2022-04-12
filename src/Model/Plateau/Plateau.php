<?php

namespace App\Model\Plateau;

use App\Model\Coordinate\Coordinate;

class Plateau
{
    private object $MinBorders,$MaxBorders;

    public function __construct(Coordinate $MaxBordersCoordinate)
    {
        $this->MinBorders = new Coordinate(0, 0);
        $this->MaxBorders = $MaxBordersCoordinate;
    }

    /**
     * @return Coordinate
     */
    public function getMinBorders(): Coordinate
    {
        return $this->MinBorders;
    }


    /**
     * @return Coordinate
     */
    public function getMaxBorders(): Coordinate
    {
        return $this->MaxBorders;
    }


}