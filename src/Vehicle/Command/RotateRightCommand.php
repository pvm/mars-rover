<?php
/**
 * Created by PhpStorm.
 * User: philippevm
 * Date: 22/04/2018
 * Time: 11:24
 */

namespace NASA\Vehicle\Command;

use NASA\Interfaces\Command;
use NASA\Interfaces\Vehicle;

class RotateRightCommand implements Command
{
    public function execute(Vehicle $vehicle)
    {
        $vehicle->rotateToRight();
    }
}