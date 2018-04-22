<?php
declare(strict_types = 1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Parser\CommandParser;
use NASA\Universe\{ Coordinate, Location };
use NASA\Universe\Orientation\{ East, North};
use NASA\Universe\Surface\Mars;
use NASA\Vehicle\Command\RotateRightCommand;
use NASA\Vehicle\Rover;
use PHPUnit\Framework\TestCase;

class RotateRightCommandTest extends TestCase
{
    /**
     * @var Rover
     */
    private $rover;

    /**
     * @throws \NASA\Exceptions\InvalidCommandException
     * @throws \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function setUp()
    {
        $surface = new Mars(new Coordinate(5, 5));
        $this->rover = new Rover(
            $surface,
            new Location(
                new Coordinate(1 , 2),
                new North()
            ),
            CommandParser::fromString('M')
        );
    }

    public function testShouldRotateRoverToRight()
    {
        $command = new RotateRightCommand();
        $command->execute($this->rover);

        $expected = new Location(new Coordinate(1, 2), new East());

        $this->assertEquals($expected, $this->rover->getCurrentLocation());
    }
}