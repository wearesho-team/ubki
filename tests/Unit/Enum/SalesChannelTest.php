<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use Wearesho\Bobra\Ubki\Enum\SalesChannel;

use PHPUnit\Framework\TestCase;

/**
 * Class SalesChannelTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass SalesChannel
 * @internal
 */
class SalesChannelTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SalesChannel::OTHER(), new SalesChannel(SalesChannel::OTHER));
        $this->assertEquals(SalesChannel::BANK_BRANCH(), new SalesChannel(SalesChannel::BANK_BRANCH));
        $this->assertEquals(SalesChannel::CREDIT_BROKER(), new SalesChannel(SalesChannel::CREDIT_BROKER));
        $this->assertEquals(SalesChannel::INTERNET(), new SalesChannel(SalesChannel::INTERNET));
        $this->assertEquals(SalesChannel::STORE(), new SalesChannel(SalesChannel::STORE));
    }
}
