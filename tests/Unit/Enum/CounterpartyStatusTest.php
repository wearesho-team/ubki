<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CounterpartyStatus;

/**
 * Class CounterpartyStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
final class CounterpartyStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CounterpartyStatus::IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT(),
            new CounterpartyStatus(CounterpartyStatus::IN_PROCESS_OF_BANKRUPTCY_OR_BANKRUPT)
        );
        $this->assertEquals(
            CounterpartyStatus::IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED(),
            new CounterpartyStatus(CounterpartyStatus::IN_PROCESS_OF_LIQUIDATION_OR_LIQUIDATED)
        );
        $this->assertEquals(
            CounterpartyStatus::NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION(),
            new CounterpartyStatus(CounterpartyStatus::NO_BANKRUPTCY_OR_LIQUIDATION_INFORMATION)
        );
    }
}
