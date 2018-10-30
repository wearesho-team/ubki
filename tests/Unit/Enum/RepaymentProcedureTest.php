<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\RepaymentProcedure;

/**
 * Class RepaymentProcedureTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class RepaymentProcedureTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            RepaymentProcedure::CREDIT_LIMIT(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::OVERDRAFT(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::NON_REVOLVING_CREDIT_LINE(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PAYMENT_MATURITY(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PAYMENTS_MONTHLY(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_FIVE_MONTH(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_MONTH(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_QUARTERLY(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_TWO_MONTH(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_TWO_WEEKS(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_YEARLY(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::REVOLVING_CREDIT_LINE(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
        $this->assertEquals(
            RepaymentProcedure::SHEET_COMMITMENTS(),
            new RepaymentProcedure(RepaymentProcedure::CREDIT_LIMIT())
        );
    }
}
