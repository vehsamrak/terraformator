<?php

namespace Tests\Service;

use Vehsamrak\Terraformator\Entity\Map;
use Vehsamrak\Terraformator\Service\MapTransformer;

/**
 * @author Vehsamrak
 */
class MapTransformerTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function convertToString_emptyMap_emptyStringReturned(): void
    {
        $map = new Map();
        $mapTransformer = new MapTransformer();

        $stringMap = $mapTransformer->convertToString($map);

        $this->assertEquals('', $stringMap);
    }
}
