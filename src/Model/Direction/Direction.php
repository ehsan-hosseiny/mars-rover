<?php

namespace App\Model\Direction;

class Direction
{
    const NORTH = "N";
    const WEST = "W";
    const EAST = "E";
    const SOUTH = "S";

    /**
     * Direction constructor.
     * @param $orientation
     * @throws \Exception
     */
    public function __construct(private string $orientation)
    {
        if (!$this->isValid($orientation)) {
            throw new \Exception("Invalid Orientation, given: " . $orientation);
        }
    }

    /**
     * @return string
     */
    public function getOrientation(): string
    {
        return $this->orientation;
    }


    /**
     * @param $orientation
     * @return bool
     */
    private function isValid($orientation): bool
    {
        return in_array(
            $orientation,
            [
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }
}
