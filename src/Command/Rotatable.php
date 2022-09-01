<?php

namespace App\Command;

abstract class Rotatable
{
    /**
     * @param $currentDirection
     * @return string
     */
    abstract protected function rotateFrom($currentDirection): string;
}