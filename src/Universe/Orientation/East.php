<?php

namespace NASA\Universe\Orientation;

use NASA\Interfaces\Orientation;

/**
 * Class East
 *
 * @package NASA\Universe\Orientation
 * @author Philippe Vanzin Moreira
 */
class East implements Orientation
{
    /**
     * Get the abbreviation of East name
     *
     * @return string
     */
    public static function getCharName(): string
    {
        return 'E';
    }

    /**
     * When you are looking for East and rotate to left you see North
     *
     * @return Orientation
     */
    public function rotateToLeft(): Orientation
    {
        return new North();
    }

    /**
     * When you are looking for East and rotate to right you see South
     *
     * @return Orientation
     */
    public function rotateToRight(): Orientation
    {
        return new South();
    }
}