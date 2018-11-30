<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\CompromisedPhoneType;

/**
 * Class CompromisedPhoneTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\CompromisedPhoneType
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
