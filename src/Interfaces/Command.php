<?php

namespace NASA\Interfaces;

/**
 * Interface Command
 *
 * @package NASA\Interfaces
 * @author Philippe Vanzin Moreira
 */
interface Command
{
    /**
     * Execute the command on a vehicle
     *
     * @param Vehicle $vehicle
     */
    public function execute(Vehicle $vehicle): void;
}