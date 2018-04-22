<?php

namespace NASA\Interfaces;

/**
 * Interface Orientation
 * Responsible to keep orientation (where is looking) of the object that use this Interface
 *
 * @package NASA\Interfaces
 * @author Philippe Vanzin Moreira
 */
interface Orientation
{
    /**
     * Get the char name of Orientation Class
     * @return string
     */
    public static function getCharName(): string;

    /**
     * Get the orientation when you rotate to left
     *
     * @return Orientation
     */
    public function rotateToLeft(): self;

    /**
     * Get the orientation when you rotate to right
     *
     * @return Orientation
     */
    public function rotateToRight(): self;
}