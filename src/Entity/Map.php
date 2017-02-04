<?php

namespace Vehsamrak\Terraformator\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Vehsamrak\Terraformator\Exception\InvalidTypeException;

/**
 * @author Vehsamrak
 */
class Map extends ArrayCollection
{

    /**
     * {@inheritDoc}
     */
    public function __construct(array $locations = [])
    {
        parent::__construct($locations);
    }

    /** {@inheritDoc} */
    public function add($element): bool
    {
        if (!$element instanceof Location) {
            throw new InvalidTypeException();
        }

        return parent::add($element);
    }

    /** {@inheritDoc} */
    public function first(): ?Location
    {
        $firstLocation = parent::first();

        if (!$firstLocation) {
            return null;
        }

        return $firstLocation;
    }
}

