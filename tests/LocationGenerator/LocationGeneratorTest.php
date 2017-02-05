<?php

namespace Tests\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\SurroundingMap;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;
use Vehsamrak\Terraformator\LocationGenerator\LocationGenerator;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class LocationGeneratorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function generateLocation_emptyMapAndFormalXandY_locationGenerated(): void
    {
        $randomGenerator = new RandomGenerator();
        $biomQualifier = new BiomQualifier($randomGenerator);
        $generator = new LocationGenerator($biomQualifier);
        $map = new SurroundingMap();
        $x = 0;
        $y = 0;

        $location = $generator->generateLocation($map, $x, $y);

        $this->assertInstanceOf(Location::class, $location);
    }
}
