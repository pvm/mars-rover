<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\South;
use NASA\Universe\Orientation\West;
use PHPUnit\Framework\TestCase;

class SouthTest extends TestCase
{
    /**
     * @var South
     */
    public $object;

    public function setUp()
    {
        $this->object = new South();
    }

    public function testShouldSeeEastWhenRotateLeft()
    {
        $actual = $this->object->rotateToLeft();
        $this->assertInstanceOf(East::class, $actual);
    }

    public function testShouldSeeWestWhenRotateRight()
    {
        $actual = $this->object->rotateToRight();
        $this->assertInstanceOf(West::class, $actual);
    }

    public function testShouldReturnTheAbbreviationOfClassName()
    {
        $expected = 'S';
        $this->assertEquals($expected, $this->object->getCharName());
    }
}