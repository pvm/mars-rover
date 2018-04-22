<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Universe\Orientation\East;
use NASA\Universe\Orientation\North;
use NASA\Universe\Orientation\South;
use PHPUnit\Framework\TestCase;

class EastTest extends TestCase
{
    /**
     * @var East
     */
    public $object;

    public function setUp()
    {
        $this->object = new East();
    }

    public function testShouldSeeNorthWhenRotateLeft()
    {
        $actual = $this->object->rotateToLeft();
        $this->assertInstanceOf(North::class, $actual);
    }

    public function testShouldSeeSouthWhenRotateRight()
    {
        $actual = $this->object->rotateToRight();
        $this->assertInstanceOf(South::class, $actual);
    }

    public function testShouldReturnTheAbbreviationOfClassName()
    {
        $expected = 'E';
        $this->assertEquals($expected, $this->object->getCharName());
    }
}