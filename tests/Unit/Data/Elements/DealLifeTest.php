<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class DealLifeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\DealLife
 * @internal
 */
class DealLifeTest extends TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\DealLife;

    protected const ELEMENT = Ubki\Data\Elements\DealLife::class;

    public const ID = 'testId';
    public const PERIOD_MONTH = 4;
    public const PERIOD_YEAR = 2012;
    public const ISSUE_DATE = '2018-03-12';
    public const END_DATE = '2019-03-12';
    public const LIMIT = 10000;
    public const MANDATORY_PAYMENT = 2000;
    public const CURRENT_DEBT = 2400.45;
    public const CURRENT_OVERDUE_DEBT = 2200;
    public const OVERDUE_TIME = 20;
    public const PAYMENT_DATE = '2018-03-12';
    public const ACTUAL_END_DATE = '2019-02-01';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\DealLife::ID,
            Ubki\Data\Interfaces\DealLife::PERIOD_MONTH,
            Ubki\Data\Interfaces\DealLife::PERIOD_YEAR,
            Ubki\Data\Interfaces\DealLife::ISSUE_DATE,
            Ubki\Data\Interfaces\DealLife::END_DATE,
            Ubki\Data\Interfaces\DealLife::STATUS,
            Ubki\Data\Interfaces\DealLife::LIMIT,
            Ubki\Data\Interfaces\DealLife::MANDATORY_PAYMENT,
            Ubki\Data\Interfaces\DealLife::CURRENT_DEBT,
            Ubki\Data\Interfaces\DealLife::CURRENT_OVERDUE_DEBT,
            Ubki\Data\Interfaces\DealLife::OVERDUE_TIME,
            Ubki\Data\Interfaces\DealLife::PAYMENT_INDICATION,
            Ubki\Data\Interfaces\DealLife::DELAY_INDICATION,
            Ubki\Data\Interfaces\DealLife::TRANCHE_INDICATION,
            Ubki\Data\Interfaces\DealLife::PAYMENT_DATE,
            Ubki\Data\Interfaces\DealLife::ACTUAL_END_DATE,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\DealLife::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'id',
            'periodMonth',
            'periodYear',
            'issueDate',
            'endDate',
            'status',
            'limit',
            'mandatoryPayment',
            'currentDebt',
            'currentOverdueDebt',
            'overdueTime',
            'paymentIndication',
            'delayIndication',
            'trancheIndication',
            'paymentDate',
            'actualEndDate'
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage 'Actual end date' must be set if deal status is CLOSE
     */
    public function testInvalidActualEndDate(): void
    {
        array_pop($this->data); // remove actual payment date to catch an exception
        new Ubki\Data\Elements\DealLife(...$this->data);
    }
}
