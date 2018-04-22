<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Interfaces\Surface;
use NASA\Parser\CommandParser;
use NASA\Universe\Coordinate;
use NASA\Universe\Location;
use NASA\Universe\Orientation\North;
use NASA\Universe\Surface\Mars;
use NASA\RoverManager;
use NASA\Vehicle\Rover;
use PHPUnit\Framework\TestCase;

class RoverManagerTest extends TestCase
{
    /**
     * @var RoverManager
     */
    public $object;

    /**
     * @var Surface
     */
    public $surface;

    /**
     * @throws \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function setUp()
    {
        $this->surface = new Mars(5, 5);
        $this->object = new RoverManager($this->surface);
    }

    public function testShouldKnowWhatSurfaceIsDeployingVehicles()
    {
        $this->assertAttributeEquals($this->surface, 'surface', $this->object);
    }

    public function testShouldReturnTheSurface()
    {
        $this->assertEquals($this->surface, $this->object->getSurface());
    }

    public function testShouldReturnTheAddedVehicles()
    {
        $this->assertEquals([], $this->object->getVehicles());
    }

    /**
     * @throws \NASA\Exceptions\InvalidCommandException
     */
    public function testShouldBeCapableToAddVehicles()
    {
        $rover = new Rover(
            $this->surface,
            new Location(
                new Coordinate(1, 2),
                new North()
            ),
            CommandParser::fromString('LM')
        );

        $this->object->addVehicle($rover);
        $this->assertCount(1, $this->object->getVehicles());
    }

    public function testShouldExecuteCommandsOfAVehicle()
    {
        $roverMock = $this
            ->getMockBuilder(Rover::class)
            ->disableOriginalConstructor()
            ->getMock();

        $roverMock
            ->expects($this->once())
            ->method('executeCommands');

        $this->object->addVehicle($roverMock);
        $this->object->deploy();
    }

    public function testShouldGetPositionsOfVehicles()
    {
        $roverMock = $this
            ->getMockBuilder(Rover::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->object->addVehicle($roverMock);
        $this->object->deploy();
        $locations = $this->object->getVehiclesLocations();

        $this->assertCount(1, $locations);
    }
}