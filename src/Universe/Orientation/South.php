<?php

namespace NASA\Universe\Orientation;

use NASA\Interfaces\Orientation;

/**
 * Class South
 * @package NASA\Universe\Orientation
 * @author Philippe Vanzin Moreira
 */
class South implements Orientation
{
    /**
     * Get the abbreviation of South name
     *
     * @return string
     */
    public static function getCharName(): string
    {
        return 'S';
    }

    /**
     * When you are looking for South and rotate to left you see East
     *
     * @return Orientation
     */
    public function rotateToLeft(): Orientation
    {
        return new East();
    }

    /**
     * When you are looking for South and rotate to left you see West
     *
     * @return Orientation
     */
    public function rotateToRight(): Orientation
    {
        return new West();
    }
}