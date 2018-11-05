<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\ContactRole;

/**
 * Class ContactRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\ContactRole
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
