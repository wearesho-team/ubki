<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\ContactType;

/**
 * Class ContactTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\ContactType
 * @internal
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
