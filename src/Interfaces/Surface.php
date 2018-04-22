<?php

namespace NASA\Interfaces;

use NASA\Universe\Coordinate;

/**
 * Interface Surface
 *
 * @package NASA\Interfaces
 */
interface Surface
{
    /**
     * Get the limit on axis x (upperRight)
     * @return int
     */
    public function getLimitX(): int;

    /**
     * Get the limit on axis y (upperLeft)
     *
     * @return int
     */
    public function getLimitY(): int;

    /**
     * Verify if a coordinate is a valid position on surface square
     *
     * @param Coordinate $coordinate
     * @return bool
     */
    public function isValidPosition(Coordinate $coordinate): bool;
}