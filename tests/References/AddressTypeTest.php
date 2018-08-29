<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\AddressType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class AddressTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass AddressType
 * @internal
 */
class AddressTypeTest extends ReferenceTestCase
{
    public function testActual(): void
    {
        $this->fakeReference = AddressType::ACTUAL(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::ACTUAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testMailing(): void
    {
        $this->fakeReference = AddressType::MAILING(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::MAILING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLegal(): void
    {
        $this->fakeReference = AddressType::LEGAL(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::LEGAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testWork(): void
    {
        $this->fakeReference = AddressType::WORK(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::WORK(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRegistration(): void
    {
        $this->fakeReference = AddressType::REGISTRATION(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::REGISTRATION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testHome(): void
    {
        $this->fakeReference = AddressType::HOME(static::DESCRIPTION);
        $this->assertEquals(
            AddressType::HOME(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
