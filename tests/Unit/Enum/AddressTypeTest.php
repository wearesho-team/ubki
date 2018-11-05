<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\AddressType;

/**
 * Class AddressTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\AddressType
 * @internal
 */
class AddressTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(AddressType::REGISTRATION(), new AddressType(AddressType::REGISTRATION));
        $this->assertEquals(AddressType::HOME(), new AddressType(AddressType::HOME));
        $this->assertEquals(AddressType::ACTUAL(), new AddressType(AddressType::ACTUAL));
        $this->assertEquals(AddressType::LEGAL(), new AddressType(AddressType::LEGAL));
        $this->assertEquals(AddressType::MAILING(), new AddressType(AddressType::MAILING));
        $this->assertEquals(AddressType::WORK(), new AddressType(AddressType::WORK));
    }
}
