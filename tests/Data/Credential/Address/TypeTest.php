<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Address;

use Wearesho\Bobra\Ubki\Data\Credential\Address\Type;

use PHPUnit\Framework\TestCase;

/**
 * Class TypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Address
 *
 * @internal
 */
class TypeTest extends TestCase
{
    public function testHome(): void
    {
        $description = 'адрес проживания';
        $address = Type::HOME($description);
        $this->assertEquals(Type::HOME, $address->getValue());
        $this->assertEquals('HOME', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testWork(): void
    {
        $description = 'рабочий адрес';
        $address = Type::WORK($description);
        $this->assertEquals(Type::WORK, $address->getValue());
        $this->assertEquals('WORK', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testLegal(): void
    {
        $description = 'юридический адрес';
        $address = Type::LEGAL($description);
        $this->assertEquals(Type::LEGAL, $address->getValue());
        $this->assertEquals('LEGAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testActual(): void
    {
        $description = 'фактический адрес';
        $address = Type::ACTUAL($description);
        $this->assertEquals(Type::ACTUAL, $address->getValue());
        $this->assertEquals('ACTUAL', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testMailing(): void
    {
        $description = 'почтовый адрес';
        $address = Type::MAILING($description);
        $this->assertEquals(Type::MAILING, $address->getValue());
        $this->assertEquals('MAILING', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }

    public function testRegistration(): void
    {
        $description = 'адрес регистрации';
        $address = Type::REGISTRATION($description);
        $this->assertEquals(Type::REGISTRATION, $address->getValue());
        $this->assertEquals('REGISTRATION', $address->getKey());
        $this->assertEquals($description, $address->getDescription());
    }
}
