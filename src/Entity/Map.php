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
    public function add($element)
    {
        if (!$element instanceof Location) {
        	throw new InvalidTypeException();
        }

        return parent::add($element);
    }
}

