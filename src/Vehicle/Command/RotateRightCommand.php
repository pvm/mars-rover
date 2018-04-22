<?php

namespace NASA\Vehicle\Command;

use NASA\Interfaces\{ Command, Vehicle };

/**
 * Class RotateRightCommand
 * @package NASA\Vehicle\Command
 * @author Philippe Vanzin Moreira
 */
class RotateRightCommand implements Command
{
    public function execute(Vehicle $vehicle): void
    {
        $vehicle->rotateToRight();
    }
}