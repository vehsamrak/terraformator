<?php

namespace Vehsamrak\Terraformator\Entity;

use Doctrine\Common\Collections\ArrayCollection;

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
}

