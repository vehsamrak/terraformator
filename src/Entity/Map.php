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

    public function getPreviousLocations(int $x, int $y): PreviousLocationMap
    {
        // filtering north, north-west, north-east and west locations by X and Y
        $previousLocations = $this->filter(
            function (Location $location) use ($x, $y) {
                $westLocationX = $x - 1;
                $westLocationY = $y;
                $northWestLocationX = $x - 1;
                $northWestLocationY = $y - 1;
                $northLocationX = $x;
                $northLocationY = $y - 1;
                $northEastLocationX = $x + 1;
                $northEastLocationY = $y - 1;

                $locationX = $location->getX();
                $locationY = $location->getY();

                return ($locationX === $westLocationX && $locationY === $westLocationY) ||
                    ($locationX === $northWestLocationX && $locationY === $northWestLocationY) ||
                    ($locationX === $northLocationX && $locationY === $northLocationY) ||
                    ($locationX === $northEastLocationX && $locationY === $northEastLocationY);

            }
        );

        return new PreviousLocationMap($previousLocations->getValues());
    }
}

