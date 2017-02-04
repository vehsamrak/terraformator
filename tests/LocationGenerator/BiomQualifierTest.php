<?php

namespace Tests\LocationGenerator;

use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Entity\SurroundingMap;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class BiomQualifierTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function qualifyBiom_surroundingMapWithEightForestBioms_biomQualifiedAsForest(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::FOREST());

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertTrue($biom->equals(Biom::FOREST()));
    }

    /** @test */
    public function qualifyBiom_surroundingMapWithEightFieldBioms_biomQualifiedAsField(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::FIELD());

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertTrue($biom->equals(Biom::FIELD()));
    }

    /** @test */
    public function qualifyBiom_emptySurroundingMap_randomBiomReturned(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = new Map();

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertInstanceOf(Biom::class, $biom);
    }

    private function createSurroundingMapWithSameLocations(Biom $biom): SurroundingMap
    {
        $location = \Phake::mock(Location::class);
        \Phake::when($location)->getBiom()->thenReturn($biom);

        $surroundingMap = new SurroundingMap();

        $numberOfLocations = 8;
        for ($i = 0; $i < $numberOfLocations; $i++) {
            $surroundingMap->add($location);
        }

        return $surroundingMap;
    }

    /**
     * @return BiomQualifier
     */
    private function createBiomGenerator(): BiomQualifier
    {
        $randomGenerator = new RandomGenerator();

        return new BiomQualifier($randomGenerator);
    }
}
