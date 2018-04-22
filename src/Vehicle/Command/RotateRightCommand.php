<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, Vehicle };

class RotateRightCommand implements Command
{
    public function execute(Vehicle $vehicle)
    {
        $vehicle->rotateToRight();
    }
}