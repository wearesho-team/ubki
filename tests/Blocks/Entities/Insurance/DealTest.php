<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities\Insurance;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Collections\Insurance\Events;
use Wearesho\Bobra\Ubki\Blocks\Entities\Insurance;

/**
 * Class DealTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities\Insurance
 * @coversDefaultClass Insurance\Deal
 * @internal
 */
class DealTest extends TestCase
{
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const INFORMATION_DATE = '2018-03-12';
    protected const START_DATE = '2017-03-12';
    protected const END_DATE = '2019-03-12';
    protected const TYPE = 1;
    protected const STATUS = 2;
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION = 1;
    protected const DECISION_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2020-03-12';

    /** @var Insurance\Deal */
    protected $fakeInsuranceDeal;

    protected function setUp(): void
    {
        $this->fakeInsuranceDeal = new Insurance\Deal(
            static::INN,
            static::ID,
            Carbon::parse(static::INFORMATION_DATE),
            Carbon::parse(static::START_DATE),
            Carbon::parse(static::END_DATE),
            static::TYPE,
            static::STATUS,
            new Events([
                new Insurance\Event(
                    Carbon::parse(static::REQUEST_DATE),
                    static::DECISION,
                    Carbon::parse(static::DECISION_DATE)
                )
            ]),
            Carbon::parse(static::ACTUAL_END_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'inn' => static::INN,
                'id' => static::ID,
                'informationDate' => static::INFORMATION_DATE,
                'startDate' => static::START_DATE,
                'endDate' => static::END_DATE,
                'type' => static::TYPE,
                'status' => static::STATUS,
                'actualEndDate' => static::ACTUAL_END_DATE,
                'events' => [
                    [
                        'requestDate' => static::REQUEST_DATE,
                        'decision' => static::DECISION,
                        'decisionDate' => static::DECISION_DATE
                    ],
                ],
            ],
            $this->fakeInsuranceDeal->jsonSerialize()
        );
    }

    public function testGetEvents(): void
    {
        $this->assertEquals(
            new Events([
                new Insurance\Event(
                    Carbon::parse(static::REQUEST_DATE),
                    static::DECISION,
                    Carbon::parse(static::DECISION_DATE)
                )
            ]),
            $this->fakeInsuranceDeal->getEvents()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeInsuranceDeal->getInn()
        );
    }

    public function testGetInformationDate(): void
    {
        $this->assertEquals(
            static::INFORMATION_DATE,
            Carbon::instance($this->fakeInsuranceDeal->getInformationDate())->toDateString()
        );
    }

    public function testGetActualEndDate(): void
    {
        $this->assertEquals(
            static::ACTUAL_END_DATE,
            Carbon::instance($this->fakeInsuranceDeal->getActualEndDate())->toDateString()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeInsuranceDeal->getId()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeInsuranceDeal->getType()
        );
    }

    public function testGetEndDate(): void
    {
        $this->assertEquals(
            static::END_DATE,
            Carbon::instance($this->fakeInsuranceDeal->getEndDate())->toDateString()
        );
    }

    public function testGetStatus(): void
    {
        $this->assertEquals(
            static::STATUS,
            $this->fakeInsuranceDeal->getStatus()
        );
    }

    public function testGetStartDate(): void
    {
        $this->assertEquals(
            static::START_DATE,
            Carbon::instance($this->fakeInsuranceDeal->getStartDate())->toDateString()
        );
    }
}
