<?php

namespace Tests\Service;

/**
 * @author Vehsamrak
 */
class RandomTester extends \PHPUnit_Framework_TestCase
{
    protected const RANDOM_SEED = 0;

    /** {@inheritDoc} */
    protected function setUp(): void
    {
        mt_srand(self::RANDOM_SEED);
    }
}
