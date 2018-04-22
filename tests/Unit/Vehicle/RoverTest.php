<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Parser\CommandParser;
use NASA\Universe\Coordinate;
use NASA\Universe\Location;
use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\West;
use NASA\Universe\Surface\Mars;
use NASA\Vehicle\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * @var Rover
     */
    public $object;

    /**
     * @var Location
     */
    public $location;

    /**
     * @throws \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     * @throws \NASA\Exceptions\InvalidCommandException
     */
    public function setUp()
    {
        $surface = new Mars(new Coordinate(5, 5));
        $coordinate = new Coordinate(1, 3);
        $this->location = new Location($coordinate, new North());

        $this->object = new Rover($surface, $this->location, CommandParser::fromString('LMR'));
    }

    public function testShouldBeCapableOfGetTheCurrentLocation()
    {
        $actual = $this->object->getCurrentLocation();
        $this->assertEquals($this->location, $actual);
    }

    public function testShouldRotateToLeft()
    {
        $this->object->rotateToLeft();
        $expected = new Location(new Coordinate(1, 3), new West());

        $actual = $this->object->getCurrentLocation();
        $this->assertEquals($expected, $actual);
    }

    public function testShouldRotateToRight()
    {
        $this->object->rotateToRight();
        $expected = new Location(new Coordinate(1, 3), new East());

        $actual = $this->object->getCurrentLocation();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException \Exception
     * @throws \Exception
     */
    public function testShouldBreakWhenMoveToAInvalidCoordinate()
    {
        $this->object
            ->rotateToLeft()
            ->move()
            ->move();
    }

    public function testShouldMoveToNextCoordinate()
    {
        $expected = new Location(new Coordinate(0, 3), new West());

        $this->object
            ->rotateToLeft()
            ->move();

        $actual = $this->object->getCurrentLocation();

        $this->assertEquals($expected, $actual);
    }

    public function testShouldExecuteVehicleCommands()
    {
        $this->object->executeCommands();

        $expected = new Location(new Coordinate(0, 3), new North());
        $actual = $this->object->getCurrentLocation();

        $this->assertEquals($expected, $actual);
    }
}