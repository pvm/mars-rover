<?php

namespace NASA\Universe\Surface;

use NASA\Exceptions\InvalidSurfaceFinalCoordinateException;
use NASA\Interfaces\Surface;
use NASA\Universe\Coordinate;

/**
 * Class Mars
 * Used to define a Mars Surface
 *
 * @package NASA\Universe\Surface
 * @author Philippe Vanzin Moreira
 */
class Mars implements Surface
{
    private $coordinateFinalX;
    private $coordinateFinalY;

    /**
     * Mars Surface constructor.
     *
     * @param int $x
     * @param int $y
     * @throws InvalidSurfaceFinalCoordinateException
     */
    public function __construct(int $x, int $y)
    {
        // The surface needs to be at least 1x1
        if ($x < 1 || $y < 1) {
            throw new InvalidSurfaceFinalCoordinateException;
        }

        $this->coordinateFinalX = $x;
        $this->coordinateFinalY = $y;
    }

    /**
     * Get the limit on x axis
     *
     * @return int
     */
    public function getLimitX(): int
    {
        return $this->coordinateFinalX;
    }

    /**
     * Get the limit on y axis
     *
     * @return int
     */
    public function getLimitY(): int
    {
        return $this->coordinateFinalY;
    }

    /**
     * Verify if the coordinate is valid inside the surface square limits
     *
     * @param Coordinate $coordinate
     * @return bool
     */
    public function isValidPosition(Coordinate $coordinate): bool
    {
        $x = $coordinate->getX();
        $y = $coordinate->getY();

        return $x <= $this->getLimitX() && $x >= 0 && $y <= $this->getLimitY() && $y >= 0;
    }
}