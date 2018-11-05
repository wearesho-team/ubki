<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\LinkedRole;

/**
 * Class LinkedRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\LinkedRole
 * @internal
 */
class LinkedRoleTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(LinkedRole::MANAGER(), new LinkedRole(LinkedRole::MANAGER));
        $this->assertEquals(LinkedRole::DIRECTOR(), new LinkedRole(LinkedRole::DIRECTOR));
        $this->assertEquals(LinkedRole::FOUNDER(), new LinkedRole(LinkedRole::FOUNDER));
    }
}
