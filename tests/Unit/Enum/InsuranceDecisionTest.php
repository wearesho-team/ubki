<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\InsuranceDecision;

/**
 * Class InsuranceDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class InsuranceDecisionTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(InsuranceDecision::POSITIVE(), new InsuranceDecision(InsuranceDecision::POSITIVE));
        $this->assertEquals(InsuranceDecision::NEGATIVE(), new InsuranceDecision(InsuranceDecision::NEGATIVE));
    }
}
