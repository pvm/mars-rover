<?php

namespace NASA\Exceptions;

/**
 * Class InvalidSurfaceFinalCoordinateException
 *
 * @package NASA\Exceptions
 * @author Philippe Vanzin Moreira
 */
class InvalidSurfaceFinalCoordinateException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Final coordinate of surface is invalid');
    }
}