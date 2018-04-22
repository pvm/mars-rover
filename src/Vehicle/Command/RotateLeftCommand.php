<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, Vehicle};

class RotateLeftCommand implements Command
{
    public function execute(Vehicle $vehicle)
    {
        $vehicle->rotateToLeft();
    }
}