<?php
/**
 * Created by PhpStorm.
 * User: philippevm
 * Date: 21/04/2018
 * Time: 17:46
 */

namespace NASA\Universe\Orientation;

use NASA\Interfaces\Orientation;

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