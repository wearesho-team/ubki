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
        $this->assertEquals(
            2400,
            $this->element->getCurrentOverdueDebt()
        );
    }

    public function testGetStatus(): void
    {
        $this->assertEquals(
            Data\CreditDeal\Status::OPEN(),
            $this->element->getStatus()
        );
    }

    public function testGetOverdueTime(): void
    {
        $this->assertEquals(
            20,
            $this->element->getOverdueTime()
        );
    }

    public function testGetPeriodMonth(): void
    {
        $this->assertEquals(
            4,
            $this->element->getPeriodMonth()
        );
    }

    public function testGetEndDate(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-05-09'),
            Carbon::instance($this->element->getEndDate())
        );
    }

    public function testGetActualEndDate(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-04-29'),
            Carbon::instance($this->element->getActualEndDate())
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            'identificator',
            $this->element->getId()
        );
    }

    public function testGetPeriodYear(): void
    {
        $this->assertEquals(
            2018,
            $this->element->getPeriodYear()
        );
    }

    public function testGetCreditTrancheIndication(): void
    {
        $this->assertEquals(
            Data\Flag::YES(),
            $this->element->getCreditTrancheIndication()
        );
    }

    public function testGetPaymentDate(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-04-29'),
            Carbon::instance($this->element->getPaymentDate())
        );
    }

    public function testGetLimit(): void
    {
        $this->assertEquals(
            10000.00,
            $this->element->getLimit()
        );
    }

    public function testGetMandatoryPayment(): void
    {
        $this->assertEquals(
            2400,
            $this->element->getMandatoryPayment()
        );
    }

    public function testGetCurrentDebt(): void
    {
        $this->assertEquals(
            2400,
            $this->element->getCurrentDebt()
        );
    }

    public function testGetDelayIndication(): void
    {
        $this->assertEquals(
            Data\Flag::YES(),
            $this->element->getDelayIndication()
        );
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            Carbon::parse('2018-04-09'),
            Carbon::instance($this->element->getIssueDate())
        );
    }

    public function testGetPaymentIndication(): void
    {
        $this->assertEquals(
            Data\Flag::YES(),
            $this->element->getPaymentIndication()
        );
    }
}
