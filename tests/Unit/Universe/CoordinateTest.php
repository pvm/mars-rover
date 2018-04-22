<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    private $x = 1;
    private $y = 2;

    /**
     * @var Coordinate
     */
    private $object;

    public function setUp()
    {
        $this->object = new Coordinate($this->x, $this->y);
    }

    public function testShouldInitializeWithXAndYPoints()
    {
        $this->assertAttributeEquals($this->x, 'x', $this->object);
        $this->assertAttributeEquals($this->y, 'y', $this->object);
    }

    public function testShouldReturnXAndYPoints()
    {
        $this->assertEquals($this->x, $this->object->getX());
        $this->assertEquals($this->y, $this->object->getY());
    }
}