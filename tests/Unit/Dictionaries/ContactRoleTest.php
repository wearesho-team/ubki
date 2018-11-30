<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\ContactRole;

/**
 * Class ContactRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\ContactRole
 * @internal
 */
class ContactRoleTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(ContactRole::ADDITIONAL(), new ContactRole(ContactRole::ADDITIONAL));
        $this->assertEquals(ContactRole::MAIN(), new ContactRole(ContactRole::MAIN));
        $this->assertEquals(ContactRole::THIRD_PERSON(), new ContactRole(ContactRole::THIRD_PERSON));
    }
}
