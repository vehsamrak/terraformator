<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Map;

/**
 * @author Vehsamrak
 */
class MapTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function construct_noParameters_newMapCreated(): void
    {
        $map = new Map();

        $this->assertInstanceOf(Map::class, $map);
    }
}
