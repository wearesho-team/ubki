<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\InsuranceDecision;

/**
 * Class InsuranceDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\InsuranceDecision
 * @internal
 */
class InsuranceDecisionTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(InsuranceDecision::POSITIVE(), new InsuranceDecision(InsuranceDecision::POSITIVE));
        $this->assertEquals(InsuranceDecision::NEGATIVE(), new InsuranceDecision(InsuranceDecision::NEGATIVE));
    }
}
