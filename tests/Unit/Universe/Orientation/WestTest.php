<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\South;
use NASA\Universe\Orientation\West;
use PHPUnit\Framework\TestCase;

class WestTest extends TestCase
{
    /**
     * @var West
     */
    public $object;

    public function setUp()
    {
        $this->object = new West();
    }

    public function testShouldSeeSouthWhenRotateLeft()
    {
        $actual = $this->object->rotateToLeft();
        $this->assertInstanceOf(South::class, $actual);
    }

    public function testShouldSeeNorthWhenRotateRight()
    {
        $actual = $this->object->rotateToRight();
        $this->assertInstanceOf(North::class, $actual);
    }

    public function testShouldReturnTheAbbreviationOfClassName()
    {
        $expected = 'W';
        $this->assertEquals($expected, $this->object->getCharName());
    }
}