<?php

namespace NASA\Interfaces;

use NASA\Universe\Coordinate;

interface Surface
{
    public function getLimitX(): int;

    public function getLimitY(): int;

    public function isValidPosition(Coordinate $coordinate): bool;
}