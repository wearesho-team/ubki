<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\RequestReason;

/**
 * Class RequestReasonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class RequestReasonTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(RequestReason::CREDIT(), new RequestReason(RequestReason::CREDIT));
        $this->assertEquals(RequestReason::EXPORT(), new RequestReason(RequestReason::EXPORT));
        $this->assertEquals(RequestReason::MONITORING(), new RequestReason(RequestReason::MONITORING));
        $this->assertEquals(RequestReason::ONLINE_CREDIT(), new RequestReason(RequestReason::ONLINE_CREDIT));
        $this->assertEquals(RequestReason::VERIFICATION(), new RequestReason(RequestReason::VERIFICATION));
    }
}
