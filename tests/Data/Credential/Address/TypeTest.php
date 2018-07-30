<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Address;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class TypeTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Address
 */
class TypeTest extends TestCase
{
    public function testHome(): void
    {
        $description = 'адрес проживания';
        $address = Data\Credential\Address\Type::HOME($description);
        $this->assertEquals(Data\Credential\Address\Type::HOME, $address->getValue());
        $this->assertEquals('HOME', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testWork(): void
    {
        $description = 'рабочий адрес';
        $address = Data\Credential\Address\Type::WORK($description);
        $this->assertEquals(Data\Credential\Address\Type::WORK, $address->getValue());
        $this->assertEquals('WORK', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testLegal(): void
    {
        $description = 'юридический адрес';
        $address = Data\Credential\Address\Type::LEGAL($description);
        $this->assertEquals(Data\Credential\Address\Type::LEGAL, $address->getValue());
        $this->assertEquals('LEGAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testActual(): void
    {
        $description = 'фактический адрес';
        $address = Data\Credential\Address\Type::ACTUAL($description);
        $this->assertEquals(Data\Credential\Address\Type::ACTUAL, $address->getValue());
        $this->assertEquals('ACTUAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testMailing(): void
    {
        $description = 'почтовый адрес';
        $address = Data\Credential\Address\Type::MAILING($description);
        $this->assertEquals(Data\Credential\Address\Type::MAILING, $address->getValue());
        $this->assertEquals('MAILING', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testRegistration(): void
    {
        $description = 'адрес регистрации';
        $address = Data\Credential\Address\Type::REGISTRATION($description);
        $this->assertEquals(Data\Credential\Address\Type::REGISTRATION, $address->getValue());
        $this->assertEquals('REGISTRATION', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }
}
