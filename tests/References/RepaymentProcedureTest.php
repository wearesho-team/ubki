<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\RepaymentProcedure;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class RepaymentProcedureTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass RepaymentProcedure
 * @internal
 */
class RepaymentProcedureTest extends ReferenceTestCase
{
    public function testSheetCommitments(): void
    {
        $this->fakeReference = RepaymentProcedure::SHEET_COMMITMENTS(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::SHEET_COMMITMENTS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicFiveMonth(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_FIVE_MONTH(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_FIVE_MONTH(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicTwoWeeks(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_TWO_WEEKS(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_TWO_WEEKS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPaymentsMonthly(): void
    {
        $this->fakeReference = RepaymentProcedure::PAYMENTS_MONTHLY(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PAYMENTS_MONTHLY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicTwoMonth(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_TWO_MONTH(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_TWO_MONTH(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicQuarterly(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_QUARTERLY(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_QUARTERLY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPaymentsIndividual(): void
    {
        $this->fakeReference = RepaymentProcedure::PAYMENTS_INDIVIDUAL(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PAYMENTS_INDIVIDUAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPaymentMaturity(): void
    {
        $this->fakeReference = RepaymentProcedure::PAYMENT_MATURITY(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PAYMENT_MATURITY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicYearly(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_YEARLY(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_YEARLY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testNonRevolvingCreditLine(): void
    {
        $this->fakeReference = RepaymentProcedure::NON_REVOLVING_CREDIT_LINE(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::NON_REVOLVING_CREDIT_LINE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRevolvingCreditLine(): void
    {
        $this->fakeReference = RepaymentProcedure::REVOLVING_CREDIT_LINE(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::REVOLVING_CREDIT_LINE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testOverdraft(): void
    {
        $this->fakeReference = RepaymentProcedure::OVERDRAFT(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::OVERDRAFT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCreditLimit(): void
    {
        $this->fakeReference = RepaymentProcedure::CREDIT_LIMIT(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::CREDIT_LIMIT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPeriodicMonth(): void
    {
        $this->fakeReference = RepaymentProcedure::PERIODIC_MONTH(static::DESCRIPTION);
        $this->assertEquals(
            RepaymentProcedure::PERIODIC_MONTH(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
