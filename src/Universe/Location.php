<?php

namespace NASA\Universe;

use NASA\Interfaces\Orientation;
use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\South;
use NASA\Universe\Orientation\West;

/**
 * Class Location
 * It's used to define the location with coordinate and orientation
 *
 * @package NASA\Universe
 * @author Philippe Vanzin Moreira
 */
class Location
{
    const ROTATE_LEFT = 1;
    const ROTATE_RIGHT = 2;

    /**
     * Coordinate of the location
     *
     * @var Coordinate
     */
    private $coordinate;

    /**
     * Orientation of the location
     *
     * @var Orientation
     */
    private $orientation;

    /**
     * Location constructor.
     *
     * @param Coordinate $coordinate
     * @param Orientation $orientation
     */
    public function __construct(Coordinate $coordinate, Orientation $orientation)
    {
        $this->coordinate = $coordinate;
        $this->orientation = $orientation;
    }

    /**
     * Return the current coordinate
     *
     * @return Coordinate
     */
    public function getCurrentCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * Return the current orientation
     *
     * @return Orientation
     */
    public function getCurrentOrientation(): Orientation
    {
        return $this->orientation;
    }

    /**
     * Rotate to left
     * Change the orientation for the new one in accord of what is defined inside of the orientation itself
     *
     * @return self
     */
    public function rotateToLeft(): self
    {
        $this->orientation = $this->orientation->rotateToLeft();
        return $this;
    }

    /**
     * Rotate to right
     * Change the orientation for the new one in accord of what is defined inside of the orientation itself
     *
     * @return self
     */
    public function rotateToRight(): self
    {
        $this->orientation = $this->orientation->rotateToRight();
        return $this;
    }

    /**
     * Get the next coordinate looking for the current orientation
     *
     * @return Coordinate
     */
    public function getNextCoordinate(): Coordinate
    {
        $x = $this->coordinate->getX();
        $y = $this->coordinate->getY();

        switch ($this->orientation->getCharName()) {
            case North::getCharName():
                $y += 1;
                break;
            case East::getCharName():
                $x += 1;
                break;
            case South::getCharName():
                $y -= 1;
                break;
            case West::getCharName():
                $x -= 1;
                break;
        }

        return new Coordinate($x, $y);
    }

    /**
     * @param Coordinate $coordinate
     */
    public function updateCoordinate(Coordinate $coordinate): void
    {
        $this->coordinate = $coordinate;
    }

    /**
     * Used when someone try to print this class
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->coordinate->getX()} {$this->coordinate->getY()} {$this->orientation->getCharName()}";
    }
}