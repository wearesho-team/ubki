<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks\InsurancesInformation;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class InsurancesInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass InsurancesInformation
 * @internal
 */
class InsurancesInformationTest extends TestCase
{
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const INFORMATION_DATE = '2018-03-12';
    protected const START_DATE = '2017-03-12';
    protected const END_DATE = '2019-03-12';
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2020-03-12';

    /** @var InsurancesInformation */
    protected $fakeInsurancesInformation;

    protected function setUp(): void
    {
        $this->fakeInsurancesInformation = new InsurancesInformation(
            new Collections\InsuranceDeals([
                new Elements\InsuranceDeal(
                    static::INN,
                    static::ID,
                    Carbon::parse(static::INFORMATION_DATE),
                    Carbon::parse(static::START_DATE),
                    Carbon::parse(static::END_DATE),
                    Dictionaries\InsuranceDealType::ACCIDENT(),
                    Dictionaries\DealStatus::CLOSE(),
                    new Collections\InsuranceEvents([
                        new Elements\InsuranceEvent(
                            Carbon::parse(static::REQUEST_DATE),
                            Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                            Carbon::parse(static::DECISION_DATE)
                        )
                    ]),
                    Carbon::parse(static::ACTUAL_END_DATE)
                )
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'insuranceDeals' => [
                    new Elements\InsuranceDeal(
                        static::INN,
                        static::ID,
                        Carbon::parse(static::INFORMATION_DATE),
                        Carbon::parse(static::START_DATE),
                        Carbon::parse(static::END_DATE),
                        Dictionaries\InsuranceDealType::ACCIDENT(),
                        Dictionaries\DealStatus::CLOSE(),
                        new Collections\InsuranceEvents([
                            new Elements\InsuranceEvent(
                                Carbon::parse(static::REQUEST_DATE),
                                Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                                Carbon::parse(static::DECISION_DATE)
                            )
                        ]),
                        Carbon::parse(static::ACTUAL_END_DATE)
                    ),
                ],
            ],
            $this->fakeInsurancesInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            InsurancesInformation::TAG,
            $this->fakeInsurancesInformation->tag()
        );
    }

    public function testGetDeals(): void
    {
        $this->assertEquals(
            new Collections\InsuranceDeals([
                new Elements\InsuranceDeal(
                    static::INN,
                    static::ID,
                    Carbon::parse(static::INFORMATION_DATE),
                    Carbon::parse(static::START_DATE),
                    Carbon::parse(static::END_DATE),
                    Dictionaries\InsuranceDealType::ACCIDENT(),
                    Dictionaries\DealStatus::CLOSE(),
                    new Collections\InsuranceEvents([
                        new Elements\InsuranceEvent(
                            Carbon::parse(static::REQUEST_DATE),
                            Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                            Carbon::parse(static::DECISION_DATE)
                        )
                    ]),
                    Carbon::parse(static::ACTUAL_END_DATE)
                )
            ]),
            $this->fakeInsurancesInformation->getDeals()
        );
    }
}
