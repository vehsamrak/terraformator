<?php

namespace Vehsamrak\Terraformator\Service;

/**
 * @author Vehsamrak
 */
class RandomGenerator
{

    public function getRandomKeyFromArray(array $array): int
    {
        return array_rand($array);
    }
}
