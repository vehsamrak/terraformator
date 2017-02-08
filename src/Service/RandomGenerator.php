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

    public function generateRandomNumber(int $from = null, int $to = null): int
    {
        return mt_rand($from, $to);
    }

    public function generateRandomPercent(): int
    {
        return $this->generateRandomNumber(1, 100);
    }
}
