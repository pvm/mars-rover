<?php

namespace NASA\Exceptions;

/**
 * Class InvalidPositionException
 *
 * @package NASA\Exceptions
 * @author Philippe Vanzin Moreira
 */
class InvalidPositionException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid position for rover movement');
    }
}