<?php

namespace Tests\Entity;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Enum\BiomEnum;
use Vehsamrak\Terraformator\Enum\LocationTypeEnum;

/**
 * @author Vehsamrak
 */
class MapLocationTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function construct_XAndYAndTypeAndBiom_newMapLocationCreated(): void
    {
        $x = 0;
        $y = 0;
        $type = LocationTypeEnum::DEEP_FOREST();
        $biom = BiomEnum::FOREST();

        $mapLocation = new Location($x, $y, $type, $biom);

        $this->assertInstanceOf(Location::class, $mapLocation);
    }
}
