<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Exceptions\InvalidCommandException;
use NASA\Parser\CommandParser;
use NASA\Vehicle\Command\MoveForwardCommand;
use NASA\Vehicle\Command\RotateLeftCommand;
use NASA\Vehicle\Command\RotateRightCommand;
use PHPUnit\Framework\TestCase;

class CommandParserTest extends TestCase
{
    /**
     * @expectedException \NASA\Exceptions\InvalidCommandException
     * @throws InvalidCommandException
     */
    public function testShouldBreakWhenInvalidCommandCharNameIsProvided()
    {
        $stringCommand = 'LRMA';
        CommandParser::fromString($stringCommand);
    }

    /**
     * @throws InvalidCommandException
     */
    public function testShouldReturnArrayOfCommands()
    {
        $stringCommand = 'LRM';
        $commands = CommandParser::fromString($stringCommand);

        $this->assertTrue(is_array($commands));
        $this->assertInstanceOf(RotateLeftCommand::class, $commands[0]);
        $this->assertInstanceOf(RotateRightCommand::class, $commands[1]);
        $this->assertInstanceOf(MoveForwardCommand::class, $commands[2]);
    }
}