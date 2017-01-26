<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Entity\MapLocation;
use Vehsamrak\Terraformator\Enum\BiomEnum;
use Vehsamrak\Terraformator\Enum\LocationTypeEnum;

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
        $mapLocation = \Phake::mock(MapLocation::class);

        $map->add($mapLocation);

        $this->assertCount(1, $map);
    }
}
