<?php

namespace NASA\Parser;

use NASA\Exceptions\InvalidCommandException;
use NASA\Vehicle\Command\{ MoveForwardCommand, RotateLeftCommand, RotateRightCommand };

class CommandParser
{
    /**
     * Allowed commands provided from NASA
     * @var array
     */
    private static $allowedCommands = [
        'L' => RotateLeftCommand::class,
        'R' => RotateRightCommand::class,
        'M' => MoveForwardCommand::class
    ];

    /**
     * Parse the string commands to commands objects
     *
     * @param $stringCommands
     * @return array
     * @throws InvalidCommandException
     */
    public static function fromString($stringCommands): array
    {
        $commands = [];
        $inArray = str_split($stringCommands);
        foreach ($inArray as $charName) {
            if (!self::isValid($charName)) {
                throw new InvalidCommandException();
            }

            $commands[] = new self::$allowedCommands[$charName];
        }

        return $commands;
    }

    /**
     * Check if the char name of a command is valid
     *
     * @param $charName
     * @return bool
     */
    private static function isValid($charName): bool
    {
        return array_key_exists($charName, self::$allowedCommands);
    }
}