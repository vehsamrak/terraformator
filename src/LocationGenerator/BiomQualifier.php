<?php

namespace Vehsamrak\Terraformator\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\Exception\UnimplementedException;

/**
 * @author Vehsamrak
 */
class BiomQualifier
{

    public function qualifyBiom(Map $map): Biom
    {
        $locationsAreSame = true;

        $firstBiom = $map->first()->getBiom();
        /** @var Location $location */
        foreach ($map->toArray() as $location) {
            if (!$location->getBiom()->equals($firstBiom)) {
            	$locationsAreSame = false;
            }
        }

        if ($map->count() == 8 && $locationsAreSame) {
        	return $firstBiom;
        }

        throw new UnimplementedException();
    }
}
