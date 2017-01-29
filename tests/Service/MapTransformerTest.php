<?php

namespace Tests\Service;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\Service\MapTransformer;

/**
 * @author Vehsamrak
 */
class MapTransformerTest extends \PHPUnit_Framework_TestCase
{

    const FOREST_SYMBOL = '^';
    const FIELD_SYMBOL = '_';

    /** @test */
    public function convertToString_emptyMap_emptyStringReturned(): void
    {
        $map = $this->createMap();
        $mapTransformer = new MapTransformer();

        $stringMap = $mapTransformer->convertToString($map);

        $this->assertEquals('', $stringMap);
    }

    /** @test */
    public function convertToString_mapWithOneForestLocation_stringWithOneSymbolReturned(): void
    {
        $map = $this->createMapWithSingleForestLocation();
        $mapTransformer = new MapTransformer();

        $stringMap = $mapTransformer->convertToString($map);

        $this->assertEquals(self::FOREST_SYMBOL, $stringMap);
    }

    /** @test */
    public function convertToString_mapWithOneForestAndOneFieldLocations_stringWithTwoSymbolsReturned(): void
    {
        $map = $this->createMapWithOneForestAndOneFieldLocations();
        $mapTransformer = new MapTransformer();

        $stringMap = $mapTransformer->convertToString($map);

        $this->assertEquals(self::FOREST_SYMBOL . self::FIELD_SYMBOL, $stringMap);
    }

    private function createMap(): Map
    {
        return new Map();
    }

    public function createMapWithSingleForestLocation(): Map
    {
        $location = \Phake::mock(Location::class);
        \Phake::when($location)->getBiom()->thenReturn(Biom::FOREST());

        $map = $this->createMap();
        $map->add($location);

        return $map;
    }

    private function createMapWithOneForestAndOneFieldLocations(): Map
    {
        $forestLocation = \Phake::mock(Location::class);
        \Phake::when($forestLocation)->getBiom()->thenReturn(Biom::FOREST());

        $fieldLocation = \Phake::mock(Location::class);
        \Phake::when($fieldLocation)->getBiom()->thenReturn(Biom::FIELD());

        $map = $this->createMap();
        $map->add($forestLocation);
        $map->add($fieldLocation);

        return $map;
    }
}
