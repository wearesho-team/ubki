<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\MaritalStatus;

/**
 * Class MaritalStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class MaritalStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(MaritalStatus::DIVORCED(), new MaritalStatus(MaritalStatus::DIVORCED));
        $this->assertEquals(MaritalStatus::MARRIED(), new MaritalStatus(MaritalStatus::MARRIED));
        $this->assertEquals(MaritalStatus::MATE(), new MaritalStatus(MaritalStatus::MATE));
        $this->assertEquals(MaritalStatus::UNMARRIED(), new MaritalStatus(MaritalStatus::UNMARRIED));
        $this->assertEquals(MaritalStatus::WIDOW(), new MaritalStatus(MaritalStatus::WIDOW));
    }
}
