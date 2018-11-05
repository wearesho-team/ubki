<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CounterpartyStatusSource;

/**
 * Class CounterpartyStatusSourceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass CounterpartyStatusSource
 * @internal
 */
class CounterpartyStatusSourceTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CounterpartyStatusSource::CORPORATE_NEWS_AGENCY(),
            new CounterpartyStatusSource(CounterpartyStatusSource::CORPORATE_NEWS_AGENCY)
        );
        $this->assertEquals(
            CounterpartyStatusSource::FROM_PUBLIC(),
            new CounterpartyStatusSource(CounterpartyStatusSource::FROM_PUBLIC)
        );
        $this->assertEquals(
            CounterpartyStatusSource::MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE(),
            new CounterpartyStatusSource(CounterpartyStatusSource::MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE)
        );
        $this->assertEquals(
            CounterpartyStatusSource::UNIFIED_STATE_REGISTER(),
            new CounterpartyStatusSource(CounterpartyStatusSource::UNIFIED_STATE_REGISTER)
        );
    }
}
