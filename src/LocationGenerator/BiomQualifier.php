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

    public function qualifyBiom(PreviousLocationMap $previousLocations): Biom
    {
        $previousLocationsNumber = $previousLocations->count();
        $newBiomProbability = $previousLocationsNumber > 0 ? 50 - $previousLocationsNumber * 10 : 100;
        $randomPercent = mt_rand(1, 100);

        if ($randomPercent <= $newBiomProbability) {
            return $this->getRandomBiom();
        } else {
            $randomLocationKey = array_rand($previousLocations->getKeys());
            /** @var Location $randomLocation */
            $randomLocation = $previousLocations->get($randomLocationKey);
            return $randomLocation->getBiom();
        }
    }

    private function getRandomBiom(): Biom
    {
        $allBioms = Biom::values();
        $randomBiomKey = $this->randomGenerator->getRandomKeyFromArray($allBioms);
        $randomBiom = $allBioms[$randomBiomKey];

        return $randomBiom;
    }
}
