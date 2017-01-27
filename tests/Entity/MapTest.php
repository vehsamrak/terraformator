<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Exception\InvalidTypeException;

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

    /** @test */
    public function add_emptyMap_mapLocationAddedToMap()
    {
        $map = new Map();
        $mapLocation = \Phake::mock(Location::class);

        $map->add($mapLocation);

        $this->assertCount(1, $map);
    }

    /** @test */
    public function add_noIstanceOfLocationPassed_exceptionThrowed()
    {
        $map = new Map();
        $notLocation = \Phake::mock(Map::class);

        $this->expectException(InvalidTypeException::class);
        $map->add($notLocation);
    }
}
