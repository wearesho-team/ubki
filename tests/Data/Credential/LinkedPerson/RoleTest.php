<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson\Role;

/**
 * Class RoleTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson
 */
class RoleTest extends TestCase
{
    public function testDirector(): void
    {
        $description = 'Руководитель';
        $linkRole = Role::DIRECTOR($description);
        $this->assertEquals(Role::DIRECTOR, $linkRole->getValue());
        $this->assertEquals('DIRECTOR', $linkRole->getKey());
        $this->assertEquals($description, $linkRole->getDescription());
    }

    public function testManager(): void
    {
        $description = 'Главный бухгалтер';
        $linkRole = Role::MANAGER($description);
        $this->assertEquals(Role::MANAGER, $linkRole->getValue());
        $this->assertEquals('MANAGER', $linkRole->getKey());
        $this->assertEquals($description, $linkRole->getDescription());
    }

    public function testFounder(): void
    {
        $description = 'Учредитель';
        $linkRole = Role::FOUNDER($description);
        $this->assertEquals(Role::FOUNDER, $linkRole->getValue());
        $this->assertEquals('FOUNDER', $linkRole->getKey());
        $this->assertEquals($description, $linkRole->getDescription());
    }
}
