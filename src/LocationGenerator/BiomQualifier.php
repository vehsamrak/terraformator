<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\PreviousLocationMap;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class BiomQualifier
{

    /** @var RandomGenerator $randomGenerator */
    private $randomGenerator;

    public function __construct(RandomGenerator $randomGenerator)
    {
        $this->randomGenerator = $randomGenerator;
    }

    public function qualifyBiom(PreviousLocationMap $map): Biom
    {
        $firstLocationInMap = $map->first();

        if (!$firstLocationInMap) {
            return $this->getRandomBiom();
        }

        $firstBiom = $firstLocationInMap->getBiom();
        $locationsAreSame = true;

        /** @var Location $location */
        foreach ($map->toArray() as $location) {
            if (!$location->getBiom()->equals($firstBiom)) {
                $locationsAreSame = false;
            }
        }

        if ($locationsAreSame) {
            return $firstBiom;
        }

        return $this->getRandomBiom();
    }

    private function getRandomBiom(): Biom
    {
        $allBioms = Biom::values();
        $randomBiomKey = $this->randomGenerator->getRandomKeyFromArray($allBioms);
        $randomBiom = $allBioms[$randomBiomKey];

        return $randomBiom;
    }
}
