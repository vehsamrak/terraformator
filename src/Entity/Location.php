<?php

namespace Vehsamrak\Terraformator\Entity;

use Vehsamrak\Terraformator\Enum\BiomEnum;
use Vehsamrak\Terraformator\Enum\LocationTypeEnum;

/**
 * @author Vehsamrak
 */
class Location
{

    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var LocationTypeEnum */
    private $type;
    /** @var BiomEnum */
    private $biom;

    public function __construct(int $x, int $y, LocationTypeEnum $type, BiomEnum $biom)
    {
        $this->x = $x;
        $this->y = $y;
        $this->type = $type;
        $this->biom = $biom;
    }
}
