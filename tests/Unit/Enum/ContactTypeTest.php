<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\ContactType;

/**
 * Class ContactTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class ContactTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(ContactType::WORK(), new ContactType(ContactType::WORK));
        $this->assertEquals(ContactType::HOME(), new ContactType(ContactType::HOME));
        $this->assertEquals(ContactType::MOBILE(), new ContactType(ContactType::MOBILE));
        $this->assertEquals(ContactType::FAX(), new ContactType(ContactType::FAX));
        $this->assertEquals(ContactType::EMAIL(), new ContactType(ContactType::EMAIL));
    }
}
