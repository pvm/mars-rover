<?php

namespace NASA\Vehicle;

use NASA\Interfaces\{
    Command, Surface, Vehicle
};
use NASA\Universe\Location;

class Rover implements Vehicle
{
    /**
     * @var Surface
     */
    private $surface;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var Command[]
     */
    private $commands;

    public function __construct(Surface $surface, Location $location, array $commands)
    {
        $this->surface = $surface;
        $this->location = $location;
        $this->commands = $commands;
    }

    /**
     * Return the current location of this Rover
     *
     * @return Location
     */
    public function getCurrentLocation(): Location
    {
        return $this->location;
    }

    /**
     * Rotate 90 degrees to left
     *
     * @return Vehicle
     */
    public function rotateToLeft(): Vehicle
    {
        $this->location->rotateToLeft();

        return $this;
    }

    /**
     * Rotate 90 degrees to right
     *
     * @return Vehicle
     */
    public function rotateToRight(): Vehicle
    {
        $this->location->rotateToRight();

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function move(): Vehicle
    {
        $nextCoordinate = $this->location->getNextCoordinate();
        if (!$this->surface->isValidPosition($nextCoordinate)) {
            // TODO make another exception for thos
            throw new \Exception('Invalid Position for rover Movement');
        }

        $this->location->updateCoordinate($nextCoordinate);

        return $this;
    }

    /**
     * Execute the commands defined for this rover
     *
     * @return Vehicle
     */
    public function executeCommands(): Vehicle
    {
        foreach ($this->commands as $command)
        {
            $command->execute($this);
        }

        return $this;
    }
}