<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, vehicle };

/**
 * Class MoveForwardCommand
 *
 * @package NASA\Vehicle\Command
 * @author Philippe Vanzin Moreira
 */
class MoveForwardCommand implements Command
{
    public function execute(Vehicle $vehicle): void
    {
        $vehicle->move();
    }
}