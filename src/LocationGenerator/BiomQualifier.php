<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;

/**
 * @author Vehsamrak
 */
class BiomQualifier
{

    public function qualifyBiom(Map $map): Biom
    {
        $firstLocationInMap = $map->first();

        if ($firstLocationInMap) {
            $firstBiom = $firstLocationInMap->getBiom();
            $locationsAreSame = true;

            /** @var Location $location */
            foreach ($map->toArray() as $location) {
                if (!$location->getBiom()->equals($firstBiom)) {
                    $locationsAreSame = false;
                }
            }

            if ($map->count() == 8 && $locationsAreSame) {
                return $firstBiom;
            }
        }

        return $this->getRandomBiom();
    }

    private function getRandomBiom(): Biom
    {
        $allBioms = Biom::values();
        $randomBiom = $allBioms[array_rand($allBioms)];

        return $randomBiom;
    }
}
