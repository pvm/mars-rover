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
     * @throws \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function setUp()
    {
        $this->object = new Mars($this->x, $this->y);
    }

    /**
     * @expectedException \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function testShouldBreakWhenXIsLowerThenOne()
    {
        $object = new Mars(0, 1);
    }

    /**
     * @expectedException \NASA\Exceptions\InvalidSurfaceFinalCoordinateException
     */
    public function testShouldBreakWhenYIsLowerThenOne()
    {
        $object = new Mars(1, 0);
    }

    public function testShouldInitializeWithXAndYPoints()
    {
        $this->assertAttributeEquals($this->x, 'coordinateFinalX', $this->object);
        $this->assertAttributeEquals($this->y, 'coordinateFinalY', $this->object);
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