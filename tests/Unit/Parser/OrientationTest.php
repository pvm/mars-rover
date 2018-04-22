<?php
declare(strict_types=1);

namespace NASA\Tests\Unit\Vehicles;

use NASA\Parser\OrientationParser;
use NASA\Universe\Orientation\North;
use PHPUnit\Framework\TestCase;

class OrientationTest extends TestCase
{
    /**
     * @expectedException \NASA\Exceptions\InvalidOrientationException
     * @throws \NASA\Exceptions\InvalidOrientationException
     */
    public function testShouldBreakWhenInvalidOrientationCharNameIsProvided()
    {
        $orientation = OrientationParser::fromString('R');
    }

    /**
     * @throws \NASA\Exceptions\InvalidOrientationException
     */
    public function testShouldReturnNorthWhenNIsProvided()
    {
        $expected = North::class;
        $actual = OrientationParser::fromString('N');

        $this->assertInstanceOf($expected, $actual);
    }
}