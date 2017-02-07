<?php

namespace Vehsamrak\Terraformator\Entity;

use Vehsamrak\Terraformator\Exception\TooManyLocationsException;

/**
 * Map with 3 or less locations to represend surroundings of new location on generation stage
 * @author Vehsamrak
 */
class PreviousLocationMap extends Map
{

    /** {@inheritDoc} */
    public function add($element): bool
    {
        if ($this->count() < 4) {
            return parent::add($element);
        } else {
            throw new TooManyLocationsException();
        }
    }
}

