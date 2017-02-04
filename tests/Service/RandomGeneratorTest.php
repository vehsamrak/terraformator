<?php

namespace Tests\Service;

use Vehsamrak\Terraformator\Service\RandomGenerator;

/**
 * @author Vehsamrak
 */
class RandomGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getRandomKeyFromArray_emptyArray_errorThrowed(): void
    {
        $randomGenerator = new RandomGenerator();
        $firstElementKey = 'first element';
        $arrayWithSingleElement = [$firstElementKey => '1'];

        $result = $randomGenerator->getRandomKeyFromArray($arrayWithSingleElement);

        $this->assertEquals($firstElementKey, $result);
    }
}
