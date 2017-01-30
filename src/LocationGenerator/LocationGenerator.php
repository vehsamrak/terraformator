<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\LocationType;

/**
 * @author Vehsamrak
 */
class LocationGenerator
{
    /** @var BiomQualifier $biomQualifier */
    private $biomQualifier;

    public function __construct(BiomQualifier $biomQualifier = null)
    {
        $this->biomQualifier = $biomQualifier ?? new BiomQualifier();
    }

    public function generateLocation(Map $map, int $x, int $y): Location
    {
        $type = LocationType::DEEP_FOREST();
        $biom = $this->biomQualifier->qualifyBiom($map);

        return new Location($x, $y, $type, $biom);
    }
}
