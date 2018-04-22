<?php

namespace NASA\Exceptions;

class InvalidOrientationException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Orientation provided is not valid');
    }
}