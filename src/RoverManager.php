<?php

namespace NASA;

use NASA\Interfaces\{ Surface, Vehicle, VehicleManager };

/**
 * Class RoverManager
 *
 * @package NASA
 * @author Philippe Vanzin Moreira
 */
class RoverManager implements VehicleManager
{
    private $surface;

    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    /**
     * RoverManager constructor.
     *
     * @param Surface $surface
     */
    public function __construct(Surface $surface)
    {
        $this->surface = $surface;
    }

    /**
     * Return the surface that rover manager is working
     *
     * @return Surface
     */
    public function getSurface(): Surface
    {
        return $this->surface;
    }

    /**
     * Return the vehicles added on Manager
     *
     * @return Vehicle[]
     */
    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    /**
     * Add a rover to the manager
     *
     * @param Vehicle $vehicle
     * @return VehicleManager
     */
    public function addVehicle(Vehicle $vehicle): VehicleManager
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    /**
     * Deploy all the rovers on order (FIFO)
     *
     * @return VehicleManager
     */
    public function deploy(): VehicleManager
    {
        for ($i=0; $i<count($this->vehicles); $i++) {
            $this->vehicles[$i]->executeCommands();
        }

        return $this;
    }

    /**
     * Get the rovers locations
     *
     * @return array
     */
    public function getVehiclesLocations(): array
    {
        $locations = [];
        foreach ($this->vehicles as $vehicle) {
            $locations[] = $vehicle->getCurrentLocation();
        }

        return $locations;
    }
}