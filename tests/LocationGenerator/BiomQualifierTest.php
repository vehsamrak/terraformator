<?php

namespace Tests\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;

/**
 * @author Vehsamrak
 */
class BiomQualifierTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function qualifyBiom_mapWithEightForestBioms_biomQualifiedAsForest(): void
    {
        $qualifier = new BiomQualifier();
        $map = $this->createMapWithSameLocations(Biom::FOREST(), 8);

        $biom = $qualifier->qualifyBiom($map);

        $this->assertTrue($biom->equals(Biom::FOREST()));
    }

    /** @test */
    public function qualifyBiom_mapWithEightFieldBioms_biomQualifiedAsField(): void
    {
        $qualifier = new BiomQualifier();
        $map = $this->createMapWithSameLocations(Biom::FIELD(), 8);

        $biom = $qualifier->qualifyBiom($map);

        $this->assertTrue($biom->equals(Biom::FIELD()));
    }

    private function createMapWithSameLocations(Biom $biom, int $numberOfLocations): Map
    {
        $location = \Phake::mock(Location::class);
        \Phake::when($location)->getBiom()->thenReturn($biom);

        $map = new Map();

        for ($i = 0; $i < $numberOfLocations; $i++) {
            $map->add($location);
        }

        return $map;
    }
}
