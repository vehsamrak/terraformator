<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\PreviousLocationMap;
use Vehsamrak\Terraformator\Enum\LocationType;

/**
 * @author Vehsamrak
 */
class LocationGenerator
{
    /** @var BiomQualifier $biomQualifier */
    private $biomQualifier;

    public function __construct(BiomQualifier $biomQualifier)
    {
        $this->biomQualifier = $biomQualifier;
    }

    public function generateLocation(PreviousLocationMap $map, int $x, int $y): Location
    {
        $biom = $this->biomQualifier->qualifyBiom($map);
        // TODO: qualify location type by biom
        $type = LocationType::DEEP_FOREST();

        return new Location($x, $y, $type, $biom);
    }
}
