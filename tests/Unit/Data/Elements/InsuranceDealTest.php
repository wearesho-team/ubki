<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class DealTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\InsuranceDeal
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

    /** @var Ubki\Data\Elements\InsuranceDeal */
    protected $fakeInsuranceDeal;

    protected function setUp(): void
    {
        $this->fakeInsuranceDeal = new Ubki\Data\Elements\InsuranceDeal(
            static::INN,
            static::ID,
            Carbon::parse(static::INFORMATION_DATE),
            Carbon::parse(static::START_DATE),
            Carbon::parse(static::END_DATE),
            Ubki\Dictionaries\InsuranceDealType::ACCIDENT(),
            Ubki\Dictionaries\DealStatus::CLOSE(),
            new Ubki\Data\Collections\InsuranceEvents([
                new Ubki\Data\Elements\InsuranceEvent(
                    Carbon::parse(static::REQUEST_DATE),
                    Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
                Ubki\Data\Elements\InsuranceDeal::INN => static::INN,
                Ubki\Data\Elements\InsuranceDeal::ID => static::ID,
                Ubki\Data\Elements\InsuranceDeal::INFORMATION_DATE => Carbon::parse(static::INFORMATION_DATE),
                Ubki\Data\Elements\InsuranceDeal::START_DATE => Carbon::parse(static::START_DATE),
                Ubki\Data\Elements\InsuranceDeal::END_DATE => Carbon::parse(static::END_DATE),
                Ubki\Data\Elements\InsuranceDeal::TYPE => Ubki\Dictionaries\InsuranceDealType::ACCIDENT(),
                Ubki\Data\Elements\InsuranceDeal::STATUS => Ubki\Dictionaries\DealStatus::CLOSE(),
                Ubki\Data\Elements\InsuranceDeal::ACTUAL_END_DATE => Carbon::parse(static::ACTUAL_END_DATE),
                'events' => [
                    new Ubki\Data\Elements\InsuranceEvent(
                        Carbon::parse(static::REQUEST_DATE),
                        Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
            Ubki\Data\Elements\InsuranceDeal::TAG,
            $this->fakeInsuranceDeal->tag()
        );
    }

    public function testGetEvents(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\InsuranceEvents([
                new Ubki\Data\Elements\InsuranceEvent(
                    Carbon::parse(static::REQUEST_DATE),
                    Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
            Ubki\Dictionaries\InsuranceDealType::ACCIDENT(),
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
            Ubki\Dictionaries\DealStatus::CLOSE(),
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
