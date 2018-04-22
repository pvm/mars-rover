<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\West;
use PHPUnit\Framework\TestCase;

class NorthTest extends TestCase
{
    /**
     * @var North
     */
    public $object;

    public function setUp()
    {
        $this->object = new North();
    }

    public function testShouldSeeWestWhenRotateLeft()
    {
        $actual = $this->object->rotateToLeft();
        $this->assertInstanceOf(West::class, $actual);
    }

    public function testShouldSeeEastWhenRotateRight()
    {
        $actual = $this->object->rotateToRight();
        $this->assertInstanceOf(East::class, $actual);
    }

    public function testShouldReturnTheAbbreviationOfClassName()
    {
        $expected = 'N';
        $this->assertEquals($expected, $this->object->getCharName());
    }
}