<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CompromisedPhoneType;

/**
 * Class CompromisedPhoneTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\CompromisedPhoneType
 * @internal
 */
class CompromisedPhoneTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CompromisedPhoneType::FRICKER(), new CompromisedPhoneType(CompromisedPhoneType::FRICKER));
        $this->assertEquals(
            CompromisedPhoneType::PAYPHONE(),
            new CompromisedPhoneType(CompromisedPhoneType::PAYPHONE)
        );
        $this->assertEquals(CompromisedPhoneType::SCAMMER(), new CompromisedPhoneType(CompromisedPhoneType::SCAMMER));
    }
}
