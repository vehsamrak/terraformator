<?php

namespace Vehsamrak\Terraformator\Entity;

use Vehsamrak\Terraformator\Exception\TooManyLocationsException;

/**
 * Map with 8 or less locations to represend surroundings of central location (3x3 location square)
 * @author Vehsamrak
 */
class SurroundingMap extends Map
{

    /** {@inheritDoc} */
    public function add($element): bool
    {
        if ($this->count() < 8) {
            return parent::add($element);
        } else {
            throw new TooManyLocationsException();
        }
    }
}

