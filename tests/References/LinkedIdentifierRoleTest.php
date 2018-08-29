<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class LinkedIdentifierRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass LinkedIdentifierRole
 * @internal
 */
class LinkedIdentifierRoleTest extends ReferenceTestCase
{
    public function testManager(): void
    {
        $this->fakeReference = LinkedIdentifierRole::MANAGER(static::DESCRIPTION);
        $this->assertEquals(
            LinkedIdentifierRole::MANAGER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testFounder(): void
    {
        $this->fakeReference = LinkedIdentifierRole::FOUNDER(static::DESCRIPTION);
        $this->assertEquals(
            LinkedIdentifierRole::FOUNDER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDirector(): void
    {
        $this->fakeReference = LinkedIdentifierRole::DIRECTOR(static::DESCRIPTION);
        $this->assertEquals(
            LinkedIdentifierRole::DIRECTOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
