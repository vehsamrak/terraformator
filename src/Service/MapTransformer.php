<?php

namespace Vehsamrak\Terraformator\Service;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Enum\Biom;

/**
 * @author Vehsamrak
 */
class MapTransformer
{

    public function convertToString(Map $map): string
    {
        $stringMap = '';

        /** @var Location $location */
        foreach ($map->toArray() as $location) {
            $biom = $location->getBiom();
            $stringMap .= $this->getSymbolByBiom($biom);
        }

        return $stringMap;
    }

    private function getSymbolByBiom(Biom $biom): string
    {
        $biomSymbolMatrix = [
            Biom::FOREST => '^',
            Biom::FIELD  => '_',
        ];

        return $biomSymbolMatrix[$biom->getValue()];
    }
}
