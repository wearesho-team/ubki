<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\RequestInitiator;

/**
 * Class RequestInitiatorTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\RequestInitiator
 * @internal
 */
final class RequestInitiatorTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(RequestInitiator::PARTNER(), new RequestInitiator(RequestInitiator::PARTNER));
        $this->assertEquals(
            RequestInitiator::CERTIFICATED_SKI(),
            new RequestInitiator(RequestInitiator::CERTIFICATED_SKI)
        );
        $this->assertEquals(RequestInitiator::COURT(), new RequestInitiator(RequestInitiator::COURT));
        $this->assertEquals(RequestInitiator::SKI(), new RequestInitiator(RequestInitiator::SKI));
    }
}
