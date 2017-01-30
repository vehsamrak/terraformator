<?php

namespace Vehsamrak\Terraformator\Enum;

use MyCLabs\Enum\Enum;

/**
 * @author Vehsamrak
 * @method static FOREST()
 * @method static DEEP_FOREST()
 * @method static FIELD()
 * @method static ROAD()
 */
class Biom extends Enum
{
    public const FOREST = 'forest';
    public const DEEP_FOREST = 'deep forest';
    public const FIELD = 'field';
    public const ROAD = 'road';
}
