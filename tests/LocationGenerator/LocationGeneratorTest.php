<?php

namespace Tests\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\LocationGenerator\LocationGenerator;

/**
 * @author Vehsamrak
 */
class LocationGeneratorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function generateLocation_noParameters_locationGenerated(): void
    {
        $generator = new LocationGenerator();
        $map = new Map();
        $x = 0;
        $y = 0;

        $location = $generator->generateLocation($map, $x, $y);

        $this->assertInstanceOf(Location::class, $location);
    }
}
