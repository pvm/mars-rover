<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Orientation;
use NASA\Universe\Coordinate;
use NASA\Universe\Location;
use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\West;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    /**
     * @var Coordinate
     */
    public $coordinate;

    /**
     * @var Orientation
     */
    public $orientation;

    /**
     * @var Location
     */
    public $object;

    public function setUp()
    {
        $this->coordinate = new Coordinate(1, 2);
        $this->orientation = new North();

        $this->object = new Location($this->coordinate, $this->orientation);
    }

    public function testShouldReturnCurrentCoordinate()
    {
        $this->assertEquals($this->coordinate, $this->object->getCurrentCoordinate());
    }

    public function testShouldReturnCurrentOrientation()
    {
        $this->assertEquals($this->orientation, $this->object->getCurrentOrientation());
    }

    public function testShouldHaveStringFormat()
    {
        $expected = '1 2 N';

        $actual = (string) $this->object;

        $this->assertEquals($expected, $actual);
    }

    public function testShouldSeeWestWhenRotateLeftFromNorth()
    {
        $this->object->rotateToLeft();
        $this->assertInstanceOf(West::class, $this->object->getCurrentOrientation());
    }

    public function testShouldSeeEastWhenRotateRightFromNorth()
    {
        $this->object->rotateToRight();
        $this->assertInstanceOf(East::class, $this->object->getCurrentOrientation());
    }

    public function testShouldUpdateCoordinate()
    {
        $coordinate = new Coordinate(1, 5);
        $this->object->updateCoordinate($coordinate);

        $this->assertEquals($coordinate, $this->object->getCurrentCoordinate());
    }

    public function testShouldGetNextCoordinateWhenFacingNorth()
    {
        $coordinate = $this->object->getNextCoordinate();
        $this->assertEquals(new Coordinate(1, 3), $coordinate);
    }

    public function testShouldGetNextCoordinateWhenFacingSouth()
    {
        // Turn to South
        $this->object
            ->rotateToLeft()
            ->rotateToLeft();

        $coordinate = $this->object->getNextCoordinate();
        $this->assertEquals(new Coordinate(1, 1), $coordinate);
    }

    public function testShouldGetNextCoordinateWhenFacingEast()
    {
        // Turn to East
        $this->object
            ->rotateToRight();

        $coordinate = $this->object->getNextCoordinate();
        $this->assertEquals(new Coordinate(2, 2), $coordinate);
    }

    public function testShouldGetNextCoordinateWhenFacingWest()
    {
        // Turn to West
        $this->object
            ->rotateToLeft();

        $coordinate = $this->object->getNextCoordinate();
        $this->assertEquals(new Coordinate(0, 2), $coordinate);
    }
}