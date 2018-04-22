<?php

namespace NASA\Parser;

use NASA\Exceptions\InvalidOrientationException;
use NASA\Interfaces\Orientation;
use NASA\Universe\Orientation\{ East, North, South, West};

class OrientationParser
{
    private static $orientations = [
        'N' => North::class,
        'E' => East::class,
        'S' => South::class,
        'W' => West::class
    ];

    /**
     * @param $charName
     * @return Orientation
     * @throws InvalidOrientationException
     */
    public static function fromString($charName): Orientation
    {
        if (!array_key_exists($charName, self::$orientations)) {
            throw new InvalidOrientationException();
        }

        return new self::$orientations[$charName];
    }
}