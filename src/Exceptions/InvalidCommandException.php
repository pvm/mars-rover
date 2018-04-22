<?php

namespace NASA\Exceptions;

class InvalidCommandException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Command provided is not valid');
    }
}