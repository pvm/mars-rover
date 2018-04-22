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
    /**
     * Generally 0, 0
     *
     * @var Coordinate
     */
    private $bottomLeft;

    /**
     * The limit of the Mars Surface
     *
     * @var Coordinate
     */
    private $upperRight;

    /**
     * Mars Surface constructor.
     *
     * @param Coordinate $upperRight
     * @throws InvalidSurfaceFinalCoordinateException
     */
    public function __construct(Coordinate $upperRight)
    {
        // The surface needs to be at least 1x1
        if ($upperRight->getX() < 1 || $upperRight->getY() < 1) {
            throw new InvalidSurfaceFinalCoordinateException;
        }

        $this->upperRight = $upperRight;
        $this->bottomLeft = new Coordinate(0, 0);
    }

    /**
     * Get the limit on x axis
     *
     * @return int
     */
    public function getLimitX(): int
    {
        return $this->upperRight->getX();
    }

    /**
     * Get the limit on y axis
     *
     * @return int
     */
    public function getLimitY(): int
    {
        return $this->upperRight->getY();
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