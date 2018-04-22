<?php
namespace NASA\Interfaces;

interface VehicleManager
{
    /**
     * @return Vehicle[]
     */
    public function getVehicles(): array;

    public function addVehicle(Vehicle $vehicle): self;
}