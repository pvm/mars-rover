<?php

namespace NASA\Interfaces;

use NASA\Universe\Location;

interface Vehicle
{
    public function getCurrentLocation(): Location;

    public function rotateToLeft(): self;

    public function rotateToRight(): self;

    public function executeCommands(): self;

    public function move(): self;
}