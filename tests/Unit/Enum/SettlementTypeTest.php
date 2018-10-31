<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\SettlementType;

/**
 * Class SettlementTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class SettlementTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SettlementType::CITY(), new SettlementType(SettlementType::CITY));
        $this->assertEquals(SettlementType::TOWNSHIP(), new SettlementType(SettlementType::TOWNSHIP));
        $this->assertEquals(SettlementType::HAMLET(), new SettlementType(SettlementType::HAMLET));
        $this->assertEquals(SettlementType::VILLAGE(), new SettlementType(SettlementType::VILLAGE));
    }
}
