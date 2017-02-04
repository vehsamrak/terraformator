<?php

namespace Vehsamrak\Terraformator\Service;

/**
 * @author Vehsamrak
 */
class RandomGenerator
{

    public function getRandomKeyFromArray(array $array): string
    {
        return (string) array_rand($array);
    }
}
