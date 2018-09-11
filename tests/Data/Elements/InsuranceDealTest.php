<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\InsuranceEvents;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class DealTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Elements\InsuranceDeal
 * @internal
 */
class InsuranceDealTest extends TestCase
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

    /** @var Elements\InsuranceDeal */
    protected $fakeInsuranceDeal;

    protected function setUp(): void
    {
        $this->fakeInsuranceDeal = new Elements\InsuranceDeal(
            static::INN,
            static::ID,
            Carbon::parse(static::INFORMATION_DATE),
            Carbon::parse(static::START_DATE),
            Carbon::parse(static::END_DATE),
            Dictionaries\InsuranceDealType::ACCIDENT(),
            Dictionaries\DealStatus::CLOSE(),
            new InsuranceEvents([
                new Elements\InsuranceEvent(
                    Carbon::parse(static::REQUEST_DATE),
                    Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
                Elements\InsuranceDeal::INN => static::INN,
                Elements\InsuranceDeal::ID => static::ID,
                Elements\InsuranceDeal::INFORMATION_DATE => Carbon::parse(static::INFORMATION_DATE),
                Elements\InsuranceDeal::START_DATE => Carbon::parse(static::START_DATE),
                Elements\InsuranceDeal::END_DATE => Carbon::parse(static::END_DATE),
                Elements\InsuranceDeal::TYPE => Dictionaries\InsuranceDealType::ACCIDENT(),
                Elements\InsuranceDeal::STATUS => Dictionaries\DealStatus::CLOSE(),
                Elements\InsuranceDeal::ACTUAL_END_DATE => Carbon::parse(static::ACTUAL_END_DATE),
                'events' => [
                    new Elements\InsuranceEvent(
                        Carbon::parse(static::REQUEST_DATE),
                        Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                        Carbon::parse(static::DECISION_DATE)
                    ),
                ],
            ],
            $this->fakeInsuranceDeal->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Elements\InsuranceDeal::TAG,
            $this->fakeInsuranceDeal->tag()
        );
    }

    public function testGetEvents(): void
    {
        $this->assertEquals(
            new InsuranceEvents([
                new Elements\InsuranceEvent(
                    Carbon::parse(static::REQUEST_DATE),
                    Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
            Dictionaries\InsuranceDealType::ACCIDENT(),
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
            Dictionaries\DealStatus::CLOSE(),
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
