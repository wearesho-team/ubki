<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\AddressType;

/**
 * Class AddressTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\AddressType
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
