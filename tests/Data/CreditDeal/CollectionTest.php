<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditDeal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditDeal
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\CreditDeal\Entity::class;

    /** @var Data\CreditDeal\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Data\CreditDeal\Collection([
            new Data\CreditDeal\Entity(
                'identificator',
                Data\Language::ENG(),
                'name',
                'last name',
                Carbon::parse('1998-03-12'),
                Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
                Data\CreditDeal\Collateral::BANK_METALS(),
                Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
                Data\Currency::EUR(),
                2400.00,
                Data\SubjectRole::BORROWER(),
                2400,
                new Data\CreditDeal\DealLife\Collection([
                    new Data\CreditDeal\DealLife\Entity(
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
                    )
                ]),
                '1234567890',
                'middle name'
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Data\CreditDeal\Collection([
                new Data\CreditDeal\Entity(
                    'identificator',
                    Data\Language::ENG(),
                    'name',
                    'last name',
                    Carbon::parse('1998-03-12'),
                    Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
                    Data\CreditDeal\Collateral::BANK_METALS(),
                    Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
                    Data\Currency::EUR(),
                    2400.00,
                    Data\SubjectRole::BORROWER(),
                    2400,
                    new Data\CreditDeal\DealLife\Collection([
                        new Data\CreditDeal\DealLife\Entity(
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
                        )
                    ]),
                    '1234567890',
                    'middle name'
                )
            ]),
            $this->collection
        );
    }
}
