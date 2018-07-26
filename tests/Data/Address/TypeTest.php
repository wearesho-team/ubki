<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Address;

use Wearesho\Bobra\Ubki;

use PHPUnit\Framework\TestCase;

/**
 * class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class TypeTest extends TestCase
{
    public function testHome(): void
    {
        $description = 'адрес проживания';
        $address = Ubki\Data\Address\Type::HOME($description);
        $this->assertEquals(Ubki\Data\Address\Type::HOME, $address->getValue());
        $this->assertEquals('HOME', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testWork(): void
    {
        $description = 'рабочий адрес';
        $address = Ubki\Data\Address\Type::WORK($description);
        $this->assertEquals(Ubki\Data\Address\Type::WORK, $address->getValue());
        $this->assertEquals('WORK', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testLegal(): void
    {
        $description = 'юридический адрес';
        $address = Ubki\Data\Address\Type::LEGAL($description);
        $this->assertEquals(Ubki\Data\Address\Type::LEGAL, $address->getValue());
        $this->assertEquals('LEGAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testActual(): void
    {
        $description = 'фактический адрес';
        $address = Ubki\Data\Address\Type::ACTUAL($description);
        $this->assertEquals(Ubki\Data\Address\Type::ACTUAL, $address->getValue());
        $this->assertEquals('ACTUAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testMailing(): void
    {
        $description = 'почтовый адрес';
        $address = Ubki\Data\Address\Type::MAILING($description);
        $this->assertEquals(Ubki\Data\Address\Type::MAILING, $address->getValue());
        $this->assertEquals('MAILING', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testRegistration(): void
    {
        $description = 'адрес регистрации';
        $address = Ubki\Data\Address\Type::REGISTRATION($description);
        $this->assertEquals(Ubki\Data\Address\Type::REGISTRATION, $address->getValue());
        $this->assertEquals('REGISTRATION', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }
}
