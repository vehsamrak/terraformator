<?php

namespace Vehsamrak\Terraformator\Entity;

use Vehsamrak\Terraformator\Enum\Biom;
use Vehsamrak\Terraformator\Enum\LocationType;

/**
 * @author Vehsamrak
 */
class Location
{

    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var LocationType */
    private $type;
    /** @var Biom */
    private $biom;

    public function __construct(int $x, int $y, LocationType $type, Biom $biom)
    {
        $this->x = $x;
        $this->y = $y;
        $this->type = $type;
        $this->biom = $biom;
    }

    public function getBiom(): Biom
    {
        return $this->biom;
    }
}
