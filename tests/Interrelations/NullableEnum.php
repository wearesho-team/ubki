<?php

namespace Wearesho\Bobra\Ubki\Tests\Interrelations;

use MyCLabs\Enum\Enum;
use PHPUnit\Framework\TestCase;

/**
 * Class NullableEnum
 * @package Wearesho\Bobra\Ubki\Tests\Interrelations
 */
class NullableEnum extends TestCase
{
    public function testEnum(): void
    {
        $enum = new class(null) extends Enum implements \Wearesho\Bobra\Ubki\Interrelations\NullableEnum
        {
        };

        $this->assertNull($enum->getValue());
        $this->assertEquals($enum::UNDEFINED(), $enum);
        $this->assertTrue($enum->equals($enum::UNDEFINED()));
    }
}
