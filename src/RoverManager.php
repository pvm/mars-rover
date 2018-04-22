<?php

namespace NASA;

use NASA\Interfaces\{Surface, Vehicle, VehicleManager};

class RoverManager implements VehicleManager
{
    private $surface;

    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    public function __construct(Surface $surface)
    {
        $this->surface = $surface;
    }

    public function getSurface(): Surface
    {
        return $this->surface;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): VehicleManager
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    public function deploy(): self
    {
        for ($i=0; $i<count($this->vehicles); $i++) {
            $this->vehicles[$i]->executeCommands();
        }

        return $this;
    }

    public function getVehiclesLocations(): array
    {
        $locations = [];
        foreach ($this->vehicles as $vehicle) {
            $locations[] = $vehicle->getCurrentLocation();
        }

        return $locations;
    }
}