<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Flag;

/**
 * Class FlagTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\Flag
 * @internal
 */
class FlagTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Flag::GUARANTOR(), new Flag(Flag::GUARANTOR));
        $this->assertEquals(Flag::NO(), new Flag(Flag::NO));
        $this->assertEquals(Flag::YES(), new Flag(Flag::YES));
        $this->assertEquals(Flag::CONSUMER(), new Flag(Flag::CONSUMER));
    }
}
