<?php

namespace NASA\Interfaces;

/**
 * Interface VehicleManager
 *
 * @package NASA\Interfaces
 * @author Philippe Vanzin Moreira
 */
interface VehicleManager
{
    /**
     * Return all vehicles registered
     *
     * @return Vehicle[]
     */
    public function getVehicles(): array;

    /**
     * Add a new vehicle to the Manager
     *
     * @param Vehicle $vehicle
     * @return VehicleManager
     */
    public function addVehicle(Vehicle $vehicle): self;

    /**
     * Deploy all the vehicles in order (FIFO)
     *
     * @return VehicleManager
     */
    public function deploy(): self;

    /**
     * Get the locations from all vehicles registered
     *
     * @return array
     */
    public function getVehiclesLocations(): array;

    /**
     * Return the surface that vehicle manager is working
     *
     * @return Surface
     */
    public function getSurface(): Surface;
}