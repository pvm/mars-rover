<?php

namespace NASA\Universe;

/**
 * Class Coordinate
 * Used to store points of Cartesian Plane
 *
 * @package NASA\Universe
 * @author Philippe Vanzin Moreira
 */
class Coordinate
{
    /**
     * Coordinate on axis X
     * @var int
     */
    private $x;

    /**
     * Coordinate on axis Y
     * @var int
     */
    private $y;

    /**
     * Coordinate constructor.
     *
     * @param $x
     * @param $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get the point on x axis
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * Get the point on y axis
     *
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}