<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\InsurancesInformation;

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
    protected const TYPE = 1;
    protected const STATUS = 2;
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION = 1;
    protected const DECISION_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2020-03-12';

    /** @var InsurancesInformation */
    protected $fakeInsurancesInformation;

    protected function setUp(): void
    {
        $this->fakeInsurancesInformation = new InsurancesInformation(
            new Collections\InsuranceDeals([
                new Elements\Insurance\InsuranceDeal(
                    static::INN,
                    static::ID,
                    Carbon::parse(static::INFORMATION_DATE),
                    Carbon::parse(static::START_DATE),
                    Carbon::parse(static::END_DATE),
                    static::TYPE,
                    static::STATUS,
                    new Collections\InsuranceEvents([
                        new Elements\Insurance\InsuranceEvent(
                            Carbon::parse(static::REQUEST_DATE),
                            static::DECISION,
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
                ],
            ],
            $this->fakeInsurancesInformation->jsonSerialize()
        );
    }

    public function testGetDeals(): void
    {
        $this->assertEquals(
            new Collections\InsuranceDeals([
                new Elements\Insurance\InsuranceDeal(
                    static::INN,
                    static::ID,
                    Carbon::parse(static::INFORMATION_DATE),
                    Carbon::parse(static::START_DATE),
                    Carbon::parse(static::END_DATE),
                    static::TYPE,
                    static::STATUS,
                    new Collections\InsuranceEvents([
                        new Elements\Insurance\InsuranceEvent(
                            Carbon::parse(static::REQUEST_DATE),
                            static::DECISION,
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
