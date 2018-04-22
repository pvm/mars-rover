<?php

namespace NASA\Universe\Orientation;

use NASA\Interfaces\Orientation;

/**
 * Class West
 * @package NASA\Universe\Orientation
 * @author Philippe Vanzin Moreira
 */
class West implements Orientation
{
    /**
     * Get the abbreviation of West name
     *
     * @return string
     */
    public static function getCharName(): string
    {
        return 'W';
    }

    /**
     * When you are looking for West and rotate to left you see South
     *
     * @return Orientation
     */
    public function rotateToLeft(): Orientation
    {
        return new South();
    }

    /**
     * When you are looking for West and rotate to left you see North
     *
     * @return Orientation
     */
    public function rotateToRight(): Orientation
    {
        return new North();
    }
}