<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class InsurancesInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\InsurancesInformation
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

    /** @var Ubki\Data\Blocks\InsurancesInformation */
    protected $fakeInsurancesInformation;

    protected function setUp(): void
    {
        $this->fakeInsurancesInformation = new Ubki\Data\Blocks\InsurancesInformation(
            new Ubki\Data\Collections\InsuranceDeals([
                new Ubki\Data\Elements\InsuranceDeal(
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
                )
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'insuranceDeals' => [
                    new Ubki\Data\Elements\InsuranceDeal(
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
                    ),
                ],
            ],
            $this->fakeInsurancesInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Blocks\InsurancesInformation::TAG,
            $this->fakeInsurancesInformation->tag()
        );
    }

    public function testGetDeals(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\InsuranceDeals([
                new Ubki\Data\Elements\InsuranceDeal(
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
                )
            ]),
            $this->fakeInsurancesInformation->getDeals()
        );
    }
}
