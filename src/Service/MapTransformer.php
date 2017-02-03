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

    public function transformToString(Map $map, int $width = 0): string
    {
        $stringMap = '';

        /** @var Location $location */
        $mapLocations = $map->toArray();

        if (!count($mapLocations)) {
            return $stringMap;
        }

        if ($width > 0) {
            foreach (array_chunk($mapLocations, $width) as $locations) {
                $stringMap .= $this->createStringSequence($locations);
                $stringMap .= PHP_EOL;
            }
        } else {
            $stringMap = $this->createStringSequence($mapLocations);
        }

        return $stringMap;
    }

    private function getSymbolByBiom(Biom $biom): string
    {
        $biomSymbolMatrix = [
            Biom::FOREST => '^',
            Biom::FIELD  => '_',
            Biom::DEEP_FOREST => '#',
            Biom::ROAD => '.',
        ];

        return $biomSymbolMatrix[$biom->getValue()];
    }

    private function createStringSequence(array $locations): string
    {
        $stringSequence = '';
        foreach ($locations as $location) {
            $biom = $location->getBiom();
            $stringSequence .= $this->getSymbolByBiom($biom);
        }

        return $stringSequence;
    }
}
