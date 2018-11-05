<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\RiskProbabilityStatus;

/**
 * Class RiskProbabilityStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass RiskProbabilityStatus
 * @internal
 */
class RiskProbabilityStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            RiskProbabilityStatus::CONFIRMED(),
            new RiskProbabilityStatus(RiskProbabilityStatus::CONFIRMED)
        );
    }
}
