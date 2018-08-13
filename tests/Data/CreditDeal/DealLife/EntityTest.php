<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditDeal\DealLife;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditDeal\DealLife
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'deallife';

    /** @var Data\CreditDeal\DealLife\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\CreditDeal\DealLife\Entity(
            'identificator',
            4,
            2018,
            Carbon::parse('2018-04-09'),
            Carbon::parse('2018-05-09'),
            Data\CreditDeal\Status::OPEN(),
            10000.00,
            2400,
            2400,
            2400,
            20,
            Data\Flag::YES(),
            Data\Flag::YES(),
            Data\Flag::YES(),
            Carbon::parse('2018-04-29'),
            Carbon::parse('2018-04-29')
        );
    }

    public function testGetCurrentOverdueDebt(): void
    {
        $expected = 2400;
        $this->assertEquals($expected, $this->element->currentOverdueDebt);
        $this->assertEquals($expected, $this->element->getCurrentOverdueDebt());
    }

    public function testGetStatus(): void
    {
        $expected = Data\CreditDeal\Status::OPEN();
        $this->assertEquals($expected, $this->element->status);
        $this->assertEquals($expected, $this->element->getStatus());
    }

    public function testGetOverdueTime(): void
    {
        $expected = 20;
        $this->assertEquals($expected, $this->element->overdueTime);
        $this->assertEquals($expected, $this->element->getOverdueTime());
    }

    public function testGetPeriodMonth(): void
    {
        $expected = 4;
        $this->assertEquals($expected, $this->element->periodMonth);
        $this->assertEquals($expected, $this->element->getPeriodMonth());
    }

    public function testGetEndDate(): void
    {
        $expected = Carbon::parse('2018-05-09');
        $this->assertEquals($expected, Carbon::instance($this->element->endDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getEndDate()));
    }

    public function testGetActualEndDate(): void
    {
        $expected = Carbon::parse('2018-04-29');
        $this->assertEquals($expected, Carbon::instance($this->element->actualEndDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getActualEndDate()));
    }

    public function testGetId(): void
    {
        $expected = 'identificator';
        $this->assertEquals($expected, $this->element->id);
        $this->assertEquals($expected, $this->element->getId());
    }

    public function testGetPeriodYear(): void
    {
        $expected = 2018;
        $this->assertEquals($expected, $this->element->periodYear);
        $this->assertEquals($expected, $this->element->getPeriodYear());
    }

    public function testGetCreditTrancheIndication(): void
    {
        $expected = Data\Flag::YES();
        $this->assertEquals($expected, $this->element->creditTrancheIndication);
        $this->assertEquals($expected, $this->element->getCreditTrancheIndication());
    }

    public function testGetPaymentDate(): void
    {
        $expected = Carbon::parse('2018-04-29');
        $this->assertEquals($expected, Carbon::instance($this->element->paymentDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getPaymentDate()));
    }

    public function testGetLimit(): void
    {
        $expected = 10000.00;
        $this->assertEquals($expected, $this->element->limit);
        $this->assertEquals($expected, $this->element->getLimit());
    }

    public function testGetMandatoryPayment(): void
    {
        $expected = 2400;
        $this->assertEquals($expected, $this->element->mandatoryPayment);
        $this->assertEquals($expected, $this->element->getMandatoryPayment());
    }

    public function testGetCurrentDebt(): void
    {
        $expected = 2400;
        $this->assertEquals($expected, $this->element->currentDebt);
        $this->assertEquals($expected, $this->element->getCurrentDebt());
    }

    public function testGetDelayIndication(): void
    {
        $expected = Data\Flag::YES();
        $this->assertEquals($expected, $this->element->delayIndication);
        $this->assertEquals($expected, $this->element->getDelayIndication());
    }

    public function testGetIssueDate(): void
    {
        $expected = Carbon::parse('2018-04-09');
        $this->assertEquals($expected, Carbon::instance($this->element->issueDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getIssueDate()));
    }

    public function testGetPaymentIndication(): void
    {
        $expected = Data\Flag::YES();
        $this->assertEquals($expected, $this->element->paymentIndication);
        $this->assertEquals($expected, $this->element->getPaymentIndication());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'id' => 'identificator',
                'periodMonth' => 4,
                'periodYear' => 2018,
                'issueDate' => '2018-04-09',
                'endDate' => '2018-05-09',
                'status' => 'OPEN',
                'limit' => 10000.00,
                'mandatoryPayment' => 2400,
                'currentDebt' => 2400,
                'currentOverdueDebt' => 2400,
                'overdueTime' => 20,
                'paymentIndication' => 'YES',
                'delayIndication' => 'YES',
                'creditTrancheIndication' => 'YES',
                'paymentDate' => '2018-04-29',
                'actualEndDate' => '2018-04-29',
            ],
            $this->element->jsonSerialize()
        );
    }
}
