<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class DealLifeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class DealLifeTest extends TestCase
{
    protected const ID = 'id';
    protected const PERIOD_MONTH = 1;
    protected const PERIOD_YEAR = 2018;
    protected const ISSUE_DATE = '2018-03-12';
    protected const END_DATE = '2020-03-12';
    protected const LIMIT = 2500.94;
    protected const MANDATORY_PAYMENT = 1000.12;
    protected const CURRENT_DEBT = 2000.12;
    protected const CURRENT_OVERDUE_DEBT = 1234.55;
    protected const OVERDUE_TIME = 12;
    protected const PAYMENT_DATE = '2019-03-12';
    protected const ACTUAL_END_DATE = '2020-03-12';

    /** @var Ubki\Data\DealLife */
    protected $deallife;

    protected function setUp(): void
    {
        $this->deallife = new Ubki\Data\DealLife(
            static::ID,
            static::PERIOD_MONTH,
            static::PERIOD_YEAR,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::END_DATE),
            Ubki\Dictionary\DealStatus::OPEN(),
            static::LIMIT,
            static::MANDATORY_PAYMENT,
            static::CURRENT_DEBT,
            static::CURRENT_OVERDUE_DEBT,
            static::OVERDUE_TIME,
            Ubki\Dictionary\Flag::YES(),
            Ubki\Dictionary\Flag::NO(),
            Ubki\Dictionary\Flag::NO(),
            Carbon::parse(static::PAYMENT_DATE),
            Carbon::parse(static::ACTUAL_END_DATE)
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('deallife', $this->deallife::tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'id' => static::ID,
                'period' => [
                    'month' => static::PERIOD_MONTH,
                    'year' => static::PERIOD_YEAR,
                ],
                'issueDate' => Carbon::parse(static::ISSUE_DATE),
                'endDate' => Carbon::parse(static::END_DATE),
                'status' => Ubki\Dictionary\DealStatus::OPEN(),
                'limit' => static::LIMIT,
                'mandatoryPayment' => static::MANDATORY_PAYMENT,
                'currentDebt' => static::CURRENT_DEBT,
                'currentOverdueDebt' => static::CURRENT_OVERDUE_DEBT,
                'overdueTime' => static::OVERDUE_TIME,
                'paymentIndication' => Ubki\Dictionary\Flag::YES(),
                'delayIndication' => Ubki\Dictionary\Flag::NO(),
                'trancheIndication' => Ubki\Dictionary\Flag::NO(),
                'paymentDate' => Carbon::make(static::PAYMENT_DATE),
                'actualEndDate' => Carbon::make(static::ACTUAL_END_DATE),
            ],
            $this->deallife->jsonSerialize()
        );
    }
}
