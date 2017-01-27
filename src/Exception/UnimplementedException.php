<?php

namespace Vehsamrak\Terraformator\Exception;

/**
 * @author Vehsamrak
 */
class UnimplementedException extends \DomainException
{

    /** {@inheritDoc} */
    public function __construct()
    {
        parent::__construct('unimplemented', 0, null);
    }

}
