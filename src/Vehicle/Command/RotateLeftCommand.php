<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, Vehicle};

/**
 * Class RotateLeftCommand
 * @package NASA\Vehicle\Command
 * @author Philippe Vanzin Moreira
 */
class RotateLeftCommand implements Command
{
    public function execute(Vehicle $vehicle): void
    {
        $vehicle->rotateToLeft();
    }
}