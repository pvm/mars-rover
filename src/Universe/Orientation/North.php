<?php

namespace NASA\Universe\Orientation;

use NASA\Interfaces\Orientation;

/**
 * Class North
 * @package NASA\Universe\Orientation
 * @author Philippe Vanzin Moreira
 */
class North implements Orientation
{
    /**
     * Get the abbreviation of North name
     *
     * @return string
     */
    public static function getCharName(): string
    {
        return 'N';
    }

    /**
     * When you are looking for North and rotate to left you see West
     *
     * @return Orientation
     */
    public function rotateToLeft(): Orientation
    {
        return new West();
    }

    /**
     * When you are looking for North and rotate to right you see East
     *
     * @return Orientation
     */
    public function rotateToRight(): Orientation
    {
        return new East();
    }
}