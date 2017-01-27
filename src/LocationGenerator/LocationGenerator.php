<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\Enum\LocationType;

/**
 * @author Vehsamrak
 */
class LocationGenerator
{

    public function generateLocation(Map $map, int $x, int $y): Location
    {
        $type = LocationType::DEEP_FOREST();
        $biom = Biom::FOREST();

        return new Location($x, $y, $type, $biom);
    }
}
