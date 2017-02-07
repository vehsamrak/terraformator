<?php

namespace Tests\LocationGenerator;

use Tests\Service\RandomTester;
use Vehsamrak\Terraformator\Entity\Location;
use Vehsamrak\Terraformator\Entity\PreviousLocationMap;
use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\LocationGenerator\BiomQualifier;
use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class BiomQualifierTest extends RandomTester
{

    /** @test */
    public function qualifyBiom_surroundingMapWithEightForestBioms_biomQualifiedAsForest(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::FOREST(), 4);

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertTrue($biom->equals(Biom::FOREST()));
    }

    /** @test */
    public function qualifyBiom_surroundingMapWithEightFieldBioms_biomQualifiedAsField(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::FIELD(), 4);

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertTrue($biom->equals(Biom::FIELD()));
    }

    /** @test */
    public function qualifyBiom_emptySurroundingMap_randomBiomReturned(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = new PreviousLocationMap();

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertInstanceOf(Biom::class, $biom);
    }

    /** @test */
    public function qualifyBiom_surroundingMapWithOneForestLocation_deepForestBiomReturned(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::DEEP_FOREST(), 1);

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertEquals(Biom::DEEP_FOREST(), $biom);
    }

    /** @test */
    public function qualifyBiom_surroundingMapWithTwoForestLocations_deepForestBiomReturned(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::DEEP_FOREST(), 2);

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertEquals(Biom::DEEP_FOREST(), $biom);
    }

    /** @test */
    public function qualifyBiom_surroundingMapWithTwoFieldLocations_fieldBiomReturned(): void
    {
        $qualifier = $this->createBiomGenerator();
        $surroundingMap = $this->createSurroundingMapWithSameLocations(Biom::FIELD(), 1);

        $biom = $qualifier->qualifyBiom($surroundingMap);

        $this->assertEquals(Biom::FIELD(), $biom);
    }

    private function createSurroundingMapWithSameLocations(Biom $biom, int $numberOfLocations): PreviousLocationMap
    {
        $location = \Phake::mock(Location::class);
        \Phake::when($location)->getBiom()->thenReturn($biom);

        $surroundingMap = new PreviousLocationMap();

        for ($i = 0; $i < $numberOfLocations; $i++) {
            $surroundingMap->add($location);
        }

        return $surroundingMap;
    }

    private function createBiomGenerator(): BiomQualifier
    {
        return new BiomQualifier(new RandomGenerator());
    }
}
