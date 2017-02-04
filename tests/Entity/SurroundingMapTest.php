<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\SurroundingMap;
use Vehsamrak\Terraformator\Exception\TooManyLocationsException;

/**
 * @author Vehsamrak
 */
class SurroundingMapTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function add_surroundingMapWith8Locations_exceptionThrowed(): void
    {
        $locations = $this->createLocations(8);
        $map = new SurroundingMap($locations);

        $this->expectException(TooManyLocationsException::class);

        $map->add($locations);
    }

    private function createLocations(int $numberOfLocations): array
    {
        $locationsArray = [];
        $location = \Phake::mock(Location::class);

        for ($i = 0; $i < $numberOfLocations; $i++) {
            $locationsArray[] = $location;
        }

        return $locationsArray;
    }
}
