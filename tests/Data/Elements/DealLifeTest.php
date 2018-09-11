<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\DealLife;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class DealLifeTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
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
            Dictionaries\DealStatus::CLOSE(),
            static::LIMIT,
            static::MANDATORY_PAYMENT,
            static::CURRENT_DEBT,
            static::CURRENT_OVERDUE_DEBT,
            static::OVERDUE_TIME,
            Dictionaries\Flag::YES(),
            Dictionaries\Flag::YES(),
            Dictionaries\Flag::NO(),
            Carbon::parse(static::PAYMENT_DATE),
            Carbon::parse(static::ACTUAL_END_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\DealLife::ID => static::ID,
                Interfaces\DealLife::PERIOD_MONTH => static::PERIOD_MONTH,
                Interfaces\DealLife::PERIOD_YEAR => static::PERIOD_YEAR,
                Interfaces\DealLife::ISSUE_DATE => Carbon::parse(static::ISSUE_DATE),
                Interfaces\DealLife::END_DATE => Carbon::parse(static::END_DATE),
                Interfaces\DealLife::STATUS => Dictionaries\DealStatus::CLOSE(),
                Interfaces\DealLife::LIMIT => static::LIMIT,
                Interfaces\DealLife::MANDATORY_PAYMENT => static::MANDATORY_PAYMENT,
                Interfaces\DealLife::CURRENT_DEBT => static::CURRENT_DEBT,
                Interfaces\DealLife::CURRENT_OVERDUE_DEBT => static::CURRENT_OVERDUE_DEBT,
                Interfaces\DealLife::OVERDUE_TIME => static::OVERDUE_TIME,
                Interfaces\DealLife::PAYMENT_INDICATION => Dictionaries\Flag::YES(),
                Interfaces\DealLife::DELAY_INDICATION => Dictionaries\Flag::YES(),
                Interfaces\DealLife::CREDIT_TRANCHE_INDICATION => Dictionaries\Flag::NO(),
                Interfaces\DealLife::PAYMENT_DATE => Carbon::parse(static::PAYMENT_DATE),
                Interfaces\DealLife::ACTUAL_END_DATE => Carbon::parse(static::ACTUAL_END_DATE),
            ],
            $this->fakeDealLife->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Interfaces\DealLife::TAG,
            $this->fakeDealLife->tag()
        );
    }

    public function testGetDelayIndication(): void
    {
        $this->assertEquals(
            Dictionaries\Flag::YES(),
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
            Dictionaries\DealStatus::CLOSE(),
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
            Dictionaries\Flag::NO(),
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
            Dictionaries\Flag::YES(),
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
            Dictionaries\DealStatus::CLOSE(),
            static::LIMIT,
            static::MANDATORY_PAYMENT,
            static::CURRENT_DEBT,
            static::CURRENT_OVERDUE_DEBT,
            static::OVERDUE_TIME,
            Dictionaries\Flag::YES(),
            Dictionaries\Flag::YES(),
            Dictionaries\Flag::NO(),
            Carbon::parse(static::PAYMENT_DATE)
        );
    }
}
