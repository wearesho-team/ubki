<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\DealStatus;

/**
 * Class DealStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\DealStatus
 * @internal
 */
class DealStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(DealStatus::PROLONGED(), new DealStatus(DealStatus::PROLONGED));
        $this->assertEquals(DealStatus::CLOSE(), new DealStatus(DealStatus::CLOSE));
        $this->assertEquals(DealStatus::OPEN(), new DealStatus(DealStatus::OPEN));
        $this->assertEquals(DealStatus::ANNULLED(), new DealStatus(DealStatus::ANNULLED));
        $this->assertEquals(DealStatus::LIQUIDATION(), new DealStatus(DealStatus::LIQUIDATION));
        $this->assertEquals(DealStatus::REPLACEMENT(), new DealStatus(DealStatus::REPLACEMENT));
        $this->assertEquals(DealStatus::RESTRUCTURED(), new DealStatus(DealStatus::RESTRUCTURED));
        $this->assertEquals(DealStatus::SOLD(), new DealStatus(DealStatus::SOLD));
        $this->assertEquals(DealStatus::TERMINATION(), new DealStatus(DealStatus::TERMINATION));
        $this->assertEquals(DealStatus::WRITE_OFF(), new DealStatus(DealStatus::WRITE_OFF));
    }
}
