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

    public function testGetters(): void
    {
        $this->assertEquals(2400, $this->element->currentOverdueDebt);
        $this->assertEquals(Data\CreditDeal\Status::OPEN(), $this->element->status);
        $this->assertEquals(20, $this->element->overdueTime);
        $this->assertEquals(4, $this->element->periodMonth);
        $this->assertEquals(Carbon::parse('2018-05-09'), Carbon::instance($this->element->endDate));
        $this->assertEquals('2018-05-09', Carbon::instance($this->element->endDate)->toDateString());
        $this->assertEquals(Carbon::parse('2018-04-29'), Carbon::instance($this->element->actualEndDate));
        $this->assertEquals('2018-04-29', Carbon::instance($this->element->actualEndDate)->toDateString());
        $this->assertEquals('identificator', $this->element->id);
        $this->assertEquals(2018, $this->element->periodYear);
        $this->assertEquals(Data\Flag::YES(), $this->element->creditTrancheIndication);
        $this->assertEquals(Carbon::parse('2018-04-29'), Carbon::instance($this->element->paymentDate));
        $this->assertEquals('2018-04-29', Carbon::instance($this->element->paymentDate)->toDateString());
        $this->assertEquals(10000.00, $this->element->limit);
        $this->assertEquals(2400, $this->element->mandatoryPayment);
        $this->assertEquals(2400, $this->element->currentDebt);
        $this->assertEquals(Data\Flag::YES(), $this->element->delayIndication);
        $this->assertEquals(Carbon::parse('2018-04-09'), Carbon::instance($this->element->issueDate));
        $this->assertEquals('2018-04-09', Carbon::instance($this->element->issueDate)->toDateString());
        $this->assertEquals(Data\Flag::YES(), $this->element->paymentIndication);
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
