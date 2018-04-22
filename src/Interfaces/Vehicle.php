<?php

namespace NASA\Interfaces;

use NASA\Universe\Location;

/**
 * Interface Vehicle
 *
 * @package NASA\Interfaces
 * @author Philippe Vanzin Moreira
 */
interface Vehicle
{
    /**
     * Get the Vehicle current position
     *
     * @return Location
     */
    public function getCurrentLocation(): Location;

    /**
     * Rotates the vehicle 90 degrees to left
     *
     * @return Vehicle
     */
    public function rotateToLeft(): self;

    /**
     * Rotates the vehicle 90 degrees to right
     *
     * @return Vehicle
     */
    public function rotateToRight(): self;

    /**
     * Move the vehicle to next position facing the orientation
     *
     * @return Vehicle
     */
    public function move(): self;

    /**
     * Execute the commands defined to a vehicle
     *
     * @return Vehicle
     */
    public function executeCommands(): self;
}