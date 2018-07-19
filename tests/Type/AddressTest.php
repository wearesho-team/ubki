<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Address;

use PHPUnit\Framework\TestCase;

/**
 * class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class AddressTest extends TestCase
{
    public function testHome(): void
    {
        $description = 'адрес проживания';
        $address = Address::HOME($description);
        $this->assertEquals(Address::HOME, $address->getValue());
        $this->assertEquals('HOME', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testWork(): void
    {
        $description = 'рабочий адрес';
        $address = Address::WORK($description);
        $this->assertEquals(Address::WORK, $address->getValue());
        $this->assertEquals('WORK', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testLegal(): void
    {
        $description = 'юридический адрес';
        $address = Address::LEGAL($description);
        $this->assertEquals(Address::LEGAL, $address->getValue());
        $this->assertEquals('LEGAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testActual(): void
    {
        $description = 'фактический адрес';
        $address = Address::ACTUAL($description);
        $this->assertEquals(Address::ACTUAL, $address->getValue());
        $this->assertEquals('ACTUAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testMailing(): void
    {
        $description = 'почтовый адрес';
        $address = Address::MAILING($description);
        $this->assertEquals(Address::MAILING, $address->getValue());
        $this->assertEquals('MAILING', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testRegistration(): void
    {
        $description = 'адрес регистрации';
        $address = Address::REGISTRATION($description);
        $this->assertEquals(Address::REGISTRATION, $address->getValue());
        $this->assertEquals('REGISTRATION', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }
}
