<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\DealLife;
use Wearesho\Bobra\Ubki\References;

/**
 * Class DealLifeTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass DealLife
 * @internal
 */
class DealLifeTest extends TestCase
{
    protected const ID = 'testId';
    protected const PERIOD_MONTH = 4;
    protected const PERIOD_YEAR = 2012;
    protected const ISSUE_DATE = '2018-03-12';
    protected const END_DATE = '2019-03-12';
    protected const LIMIT = 10000;
    protected const MANDATORY_PAYMENT = 2000;
    protected const CURRENT_DEBT = 2400.45;
    protected const CURRENT_OVERDUE_DEBT = 2200;
    protected const OVERDUE_TIME = 20;
    protected const PAYMENT_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2019-02-01';

    /** @var DealLife */
    protected $fakeDealLife;

    protected function setUp(): void
    {
        $this->fakeDealLife = new DealLife(
            static::ID,
            static::PERIOD_MONTH,
            static::PERIOD_YEAR,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::END_DATE),
            References\DealStatus::CLOSE(),
            static::LIMIT,
            static::MANDATORY_PAYMENT,
            static::CURRENT_DEBT,
            static::CURRENT_OVERDUE_DEBT,
            static::OVERDUE_TIME,
            References\Flag::YES(),
            References\Flag::YES(),
            References\Flag::NO(),
            Carbon::parse(static::PAYMENT_DATE),
            Carbon::parse(static::ACTUAL_END_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'id' => static::ID,
                'periodMonth' => static::PERIOD_MONTH,
                'periodYear' => static::PERIOD_YEAR,
                'issueDate' => static::ISSUE_DATE,
                'endDate' => static::END_DATE,
                'status' => References\DealStatus::CLOSE()->getKey(),
                'limit' => static::LIMIT,
                'mandatoryPayment' => static::MANDATORY_PAYMENT,
                'currentDebt' => static::CURRENT_DEBT,
                'currentOverdueDebt' => static::CURRENT_OVERDUE_DEBT,
                'overdueTime' => static::OVERDUE_TIME,
                'paymentIndication' => References\Flag::YES()->getKey(),
                'delayIndication' => References\Flag::YES()->getKey(),
                'creditTrancheIndication' => References\Flag::NO()->getKey(),
                'paymentDate' => static::PAYMENT_DATE,
                'actualEndDate' => static::ACTUAL_END_DATE,
            ],
            $this->fakeDealLife->jsonSerialize()
        );
    }

    public function testGetDelayIndication(): void
    {
        $this->assertEquals(
            References\Flag::YES(),
            $this->fakeDealLife->getDelayIndication()
        );
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            static::ISSUE_DATE,
            Carbon::instance($this->fakeDealLife->getIssueDate())->toDateString()
        );
    }

    public function testGetCurrentDebt(): void
    {
        $this->assertEquals(
            static::CURRENT_DEBT,
            $this->fakeDealLife->getCurrentDebt()
        );
    }

    public function testGetPeriodYear(): void
    {
        $this->assertEquals(
            static::PERIOD_YEAR,
            $this->fakeDealLife->getPeriodYear()
        );
    }

    public function testGetStatus(): void
    {
        $this->assertEquals(
            References\DealStatus::CLOSE(),
            $this->fakeDealLife->getStatus()
        );
    }

    public function testGetCurrentOverdueDebt(): void
    {
        $this->assertEquals(
            static::CURRENT_OVERDUE_DEBT,
            $this->fakeDealLife->getCurrentOverdueDebt()
        );
    }

    public function testGetCreditTrancheIndication(): void
    {
        $this->assertEquals(
            References\Flag::NO(),
            $this->fakeDealLife->getCreditTrancheIndication()
        );
    }

    public function testGetOverdueTime(): void
    {
        $this->assertEquals(
            static::OVERDUE_TIME,
            $this->fakeDealLife->getOverdueTime()
        );
    }

    public function testGetPaymentIndication(): void
    {
        $this->assertEquals(
            References\Flag::YES(),
            $this->fakeDealLife->getPaymentIndication()
        );
    }

    public function testGetActualEndDate(): void
    {
        $this->assertEquals(
            static::ACTUAL_END_DATE,
            Carbon::instance($this->fakeDealLife->getActualEndDate())->toDateString()
        );
    }

    public function testGetPeriodMonth(): void
    {
        $this->assertEquals(
            static::PERIOD_MONTH,
            $this->fakeDealLife->getPeriodMonth()
        );
    }

    public function testGetMandatoryPayment(): void
    {
        $this->assertEquals(
            static::MANDATORY_PAYMENT,
            $this->fakeDealLife->getMandatoryPayment()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeDealLife->getId()
        );
    }

    public function testGetPaymentDate(): void
    {
        $this->assertEquals(
            static::PAYMENT_DATE,
            Carbon::instance($this->fakeDealLife->getPaymentDate())->toDateString()
        );
    }

    public function testGetEndDate(): void
    {
        $this->assertEquals(
            static::END_DATE,
            Carbon::instance($this->fakeDealLife->getEndDate())->toDateString()
        );
    }

    public function testGetLimit(): void
    {
        $this->assertEquals(
            static::LIMIT,
            $this->fakeDealLife->getLimit()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage 'Actual end date' must be set if deal status is CLOSE
     */
    public function testInvalidActualEndDate(): void
    {
        $this->fakeDealLife = new DealLife(
            static::ID,
            static::PERIOD_MONTH,
            static::PERIOD_YEAR,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::END_DATE),
            References\DealStatus::CLOSE(),
            static::LIMIT,
            static::MANDATORY_PAYMENT,
            static::CURRENT_DEBT,
            static::CURRENT_OVERDUE_DEBT,
            static::OVERDUE_TIME,
            References\Flag::YES(),
            References\Flag::YES(),
            References\Flag::NO(),
            Carbon::parse(static::PAYMENT_DATE)
        );
    }
}
