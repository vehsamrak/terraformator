<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\LocationType;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class LocationGenerator
{
    /** @var BiomQualifier $biomQualifier */
    private $biomQualifier;
    /** @var RandomGenerator $randomGenerator */
    private $randomGenerator;

    public function __construct(BiomQualifier $biomQualifier = null, RandomGenerator $randomGenerator = null)
    {
        $this->randomGenerator = $randomGenerator ?? new RandomGenerator();
        $this->biomQualifier = $biomQualifier ?? new BiomQualifier($this->randomGenerator);
    }

    public function generateLocation(Map $map, int $x, int $y): Location
    {
        $biom = $this->biomQualifier->qualifyBiom($map);
        // TODO: qualify location type by biom
        $type = LocationType::DEEP_FOREST();

        return new Location($x, $y, $type, $biom);
    }
}
