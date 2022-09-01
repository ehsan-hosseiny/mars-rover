<?php

namespace App\Test\Model\Direction;

use App\Model\Direction\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    /** @test  */
    public function throwsExceptionWhenInvalidOrientationGiven()
    {
        $this->expectException(\Exception::class);
        new Direction("SW"); // SW not imp
    }
}