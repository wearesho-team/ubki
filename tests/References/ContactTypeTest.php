<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\ContactType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class ContactTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass ContactType
 * @internal
 */
class ContactTypeTest extends ReferenceTestCase
{
    public function testMobile(): void
    {
        $this->fakeReference = ContactType::MOBILE(static::DESCRIPTION);
        $this->assertEquals(ContactType::MOBILE(static::DESCRIPTION), $this->fakeReference);
    }

    public function testWork(): void
    {
        $this->fakeReference = ContactType::WORK(static::DESCRIPTION);
        $this->assertEquals(ContactType::WORK(static::DESCRIPTION), $this->fakeReference);
    }

    public function testHome(): void
    {
        $this->fakeReference = ContactType::HOME(static::DESCRIPTION);
        $this->assertEquals(ContactType::HOME(static::DESCRIPTION), $this->fakeReference);
    }

    public function testFax(): void
    {
        $this->fakeReference = ContactType::FAX(static::DESCRIPTION);
        $this->assertEquals(ContactType::FAX(static::DESCRIPTION), $this->fakeReference);
    }

    public function testEmail(): void
    {
        $this->fakeReference = ContactType::EMAIL(static::DESCRIPTION);
        $this->assertEquals(ContactType::EMAIL(static::DESCRIPTION), $this->fakeReference);
    }
}
