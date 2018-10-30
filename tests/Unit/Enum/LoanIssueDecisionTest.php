<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\LoanIssueDecision;

/**
 * Class LoanIssueDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class LoanIssueDecisionTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(LoanIssueDecision::NEGATIVE(), new LoanIssueDecision(LoanIssueDecision::NEGATIVE));
        $this->assertEquals(LoanIssueDecision::POSITIVE(), new LoanIssueDecision(LoanIssueDecision::POSITIVE));
    }
}
