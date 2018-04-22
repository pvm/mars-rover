<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, vehicle };

class MoveForwardCommand implements Command
{
    public function execute(Vehicle $vehicle)
    {
        $vehicle->move();
    }
}