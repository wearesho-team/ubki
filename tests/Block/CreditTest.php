<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CreditTest extends TestCase
{
    /** @var Ubki\Block\Credit */
    protected $creditDeals;

    protected function setUp(): void
    {
        $this->creditDeals = new Ubki\Block\Credit(
            new Ubki\Data\CreditDeal\Collection([
                new Ubki\Data\CreditDeal\Entity(
                    'identificator',
                    Ubki\Data\Language::ENG(),
                    'name',
                    'last name',
                    Carbon::parse('1998-03-12'),
                    Ubki\Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
                    Ubki\Data\CreditDeal\Collateral::BANK_METALS(),
                    Ubki\Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
                    Ubki\Data\Currency::EUR(),
                    2400.00,
                    Ubki\Data\SubjectRole::BORROWER(),
                    2400,
                    new Ubki\Data\CreditDeal\DealLife\Collection([
                        new Ubki\Data\CreditDeal\DealLife\Entity(
                            'identificator',
                            4,
                            2018,
                            Carbon::parse('2018-04-09'),
                            Carbon::parse('2018-05-09'),
                            Ubki\Data\CreditDeal\Status::OPEN(),
                            10000.00,
                            2400,
                            2400,
                            2400,
                            20,
                            1,
                            1,
                            1,
                            Carbon::parse('2018-04-29'),
                            Carbon::parse('2018-04-29')
                        )
                    ]),
                    '1234567890',
                    'middle name'
                )
            ])
        );
    }

    public function testGetDeals()
    {
        $deals = new Ubki\Block\Credit(
            new Ubki\Data\CreditDeal\Collection([
                new Ubki\Data\CreditDeal\Entity(
                    'identificator',
                    Ubki\Data\Language::ENG(),
                    'name',
                    'last name',
                    Carbon::parse('1998-03-12'),
                    Ubki\Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
                    Ubki\Data\CreditDeal\Collateral::BANK_METALS(),
                    Ubki\Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
                    Ubki\Data\Currency::EUR(),
                    2400.00,
                    Ubki\Data\SubjectRole::BORROWER(),
                    2400,
                    new Ubki\Data\CreditDeal\DealLife\Collection([
                        new Ubki\Data\CreditDeal\DealLife\Entity(
                            'identificator',
                            4,
                            2018,
                            Carbon::parse('2018-04-09'),
                            Carbon::parse('2018-05-09'),
                            Ubki\Data\CreditDeal\Status::OPEN(),
                            10000.00,
                            2400,
                            2400,
                            2400,
                            20,
                            1,
                            1,
                            1,
                            Carbon::parse('2018-04-29'),
                            Carbon::parse('2018-04-29')
                        )
                    ]),
                    '1234567890',
                    'middle name'
                )
            ])
        );
        $this->assertEquals(Ubki\Block\Credit::ID, $this->creditDeals->getId());
        $this->assertEquals(
            $deals->getDeals(),
            $this->creditDeals->getDeals()
        );
    }
}
