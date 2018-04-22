<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Coordinate;
use NASA\Universe\Surface\Mars;
use PHPUnit\Framework\TestCase;

class MarsTest extends TestCase
{
    public $x = 1;

    public $y = 1;

    /**
     * @var Mars
     */
    public $object;

    /**
     * @var Coordinate
     */
    public $coordinate;

    /**
     * @throws \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function setUp()
    {
        $this->coordinate = new Coordinate($this->x, $this->y);
        $this->object = new Mars($this->coordinate);
    }

    /**
     * @expectedException \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function testShouldBreakWhenXIsLowerThenOne()
    {
        $coordinate = new Coordinate(0, 1);
        $object = new Mars($coordinate);
    }

    /**
     * @expectedException \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function testShouldBreakWhenYIsLowerThenOne()
    {
        $coordinate = new Coordinate(1, 0);
        $object = new Mars($coordinate);
    }

    public function testShouldInitializeWithXAndYPoints()
    {
        $this->assertAttributeEquals($this->coordinate, 'upperRight', $this->object);
        $this->assertAttributeEquals(new Coordinate(0, 0), 'bottomLeft', $this->object);
    }

    public function testShouldReturnTheXLimit()
    {
        $this->assertEquals($this->x, $this->object->getLimitX());
    }

    public function testShouldReturnTheYLimit()
    {
        $this->assertEquals($this->x, $this->object->getLimitY());
    }

    public function testShouldValidateCoordinatesOnSurfaceSquare()
    {
        $expectedFalse = new Coordinate(2, 2);
        $expectedTrue = new Coordinate(1, 1);

        $this->assertTrue($this->object->isValidPosition($expectedTrue));
        $this->assertFalse($this->object->isValidPosition($expectedFalse));
    }
}