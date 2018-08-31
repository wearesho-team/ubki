<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\References;

/**
 * Class CreditsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Blocks\CreditsInformation
 * @internal
 */
class CreditsInformationTest extends TestCase
{
    protected const ID = 'testId';
    protected const NAME = 'testName';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '1998-03-12';
    protected const INITIAL_AMOUNT = 5000.00;
    protected const COLLATERAL_COST = 5000.00;
    protected const PERIOD_MONTH = 4;
    protected const PERIOD_YEAR = 2012;
    protected const ISSUE_DATE = '2018-03-12';
    protected const END_DATE = '2019-03-12';
    protected const LIMIT = 10000;
    protected const MANDATORY_PAYMENT = 2000;
    protected const CURRENT_DEBT = 2400.45;
    protected const CURRENT_OVERDUE_DEBT = 2200;
    protected const OVERDUE_TIME = 20;
    protected const PAYMENT_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2019-02-01';
    protected const INN = 'testInn';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SOURCE = 'testSource';

    /** @var Blocks\CreditsInformation */
    protected $fakeCreditsInformation;

    protected function setUp(): void
    {
        $this->fakeCreditsInformation = new Blocks\CreditsInformation(
            new Blocks\Collections\CreditDeals([
                new Blocks\Entities\CreditDeal(
                    static::ID,
                    References\Language::RUS(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    References\CreditDealType::COMMERCIAL_CREDIT(),
                    References\CollateralType::R_1(),
                    References\RepaymentProcedure::PERIODIC_MONTH(),
                    References\Currency::UAH(),
                    static::INITIAL_AMOUNT,
                    References\SubjectRole::BORROWER(),
                    static::COLLATERAL_COST,
                    new Blocks\Collections\DealLifes([
                        new Blocks\Entities\DealLife(
                            static::ID,
                            static::PERIOD_MONTH,
                            static::PERIOD_YEAR,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::END_DATE),
                            References\DealStatus::CLOSE(),
                            static::LIMIT,
                            static::MANDATORY_PAYMENT,
                            static::CURRENT_DEBT,
                            static::CURRENT_OVERDUE_DEBT,
                            static::OVERDUE_TIME,
                            References\Flag::YES(),
                            References\Flag::YES(),
                            References\Flag::NO(),
                            Carbon::parse(static::PAYMENT_DATE),
                            Carbon::parse(static::ACTUAL_END_DATE)
                        )
                    ]),
                    static::INN,
                    static::PATRONYMIC,
                    static::SOURCE
                )
            ])
        );
    }

    public function testGetCreditCollection(): void
    {
        $this->assertEquals(
            new Blocks\Collections\CreditDeals([
                new Blocks\Entities\CreditDeal(
                    static::ID,
                    References\Language::RUS(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    References\CreditDealType::COMMERCIAL_CREDIT(),
                    References\CollateralType::R_1(),
                    References\RepaymentProcedure::PERIODIC_MONTH(),
                    References\Currency::UAH(),
                    static::INITIAL_AMOUNT,
                    References\SubjectRole::BORROWER(),
                    static::COLLATERAL_COST,
                    new Blocks\Collections\DealLifes([
                        new Blocks\Entities\DealLife(
                            static::ID,
                            static::PERIOD_MONTH,
                            static::PERIOD_YEAR,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::END_DATE),
                            References\DealStatus::CLOSE(),
                            static::LIMIT,
                            static::MANDATORY_PAYMENT,
                            static::CURRENT_DEBT,
                            static::CURRENT_OVERDUE_DEBT,
                            static::OVERDUE_TIME,
                            References\Flag::YES(),
                            References\Flag::YES(),
                            References\Flag::NO(),
                            Carbon::parse(static::PAYMENT_DATE),
                            Carbon::parse(static::ACTUAL_END_DATE)
                        )
                    ]),
                    static::INN,
                    static::PATRONYMIC,
                    static::SOURCE
                )
            ]),
            $this->fakeCreditsInformation->getCreditCollection()
        );
    }
}
