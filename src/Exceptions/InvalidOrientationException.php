<?php

namespace NASA\Exceptions;

/**
 * Class InvalidOrientationException
 * @package NASA\Exceptions
 * @author Philippe Vanzin Moreira
 */
class InvalidOrientationException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Orientation provided is not valid');
    }
}