<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\PreviousLocationMap;
use Vehsamrak\Terraformator\Exception\TooManyLocationsException;

/**
 * @author Vehsamrak
 */
class SurroundingMapTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function add_surroundingMapWith4Locations_exceptionThrowed(): void
    {
        $locations = $this->createLocations(4);
        $map = new PreviousLocationMap($locations);

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
