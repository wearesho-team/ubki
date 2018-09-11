<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class CreditsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditsInformation
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
            new Collections\CreditDeals([
                new Elements\CreditDeal(
                    static::ID,
                    Dictionaries\Language::RUS(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                    Dictionaries\CollateralType::R_1(),
                    Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
                    Dictionaries\Currency::UAH(),
                    static::INITIAL_AMOUNT,
                    Dictionaries\SubjectRole::BORROWER(),
                    static::COLLATERAL_COST,
                    new Collections\DealLifes([
                        new Elements\DealLife(
                            static::ID,
                            static::PERIOD_MONTH,
                            static::PERIOD_YEAR,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::END_DATE),
                            Dictionaries\DealStatus::CLOSE(),
                            static::LIMIT,
                            static::MANDATORY_PAYMENT,
                            static::CURRENT_DEBT,
                            static::CURRENT_OVERDUE_DEBT,
                            static::OVERDUE_TIME,
                            Dictionaries\Flag::YES(),
                            Dictionaries\Flag::YES(),
                            Dictionaries\Flag::NO(),
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

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'credits' => [
                    new Elements\CreditDeal(
                        static::ID,
                        Dictionaries\Language::RUS(),
                        static::NAME,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                        Dictionaries\CollateralType::R_1(),
                        Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
                        Dictionaries\Currency::UAH(),
                        static::INITIAL_AMOUNT,
                        Dictionaries\SubjectRole::BORROWER(),
                        static::COLLATERAL_COST,
                        new Collections\DealLifes([
                            new Elements\DealLife(
                                static::ID,
                                static::PERIOD_MONTH,
                                static::PERIOD_YEAR,
                                Carbon::parse(static::ISSUE_DATE),
                                Carbon::parse(static::END_DATE),
                                Dictionaries\DealStatus::CLOSE(),
                                static::LIMIT,
                                static::MANDATORY_PAYMENT,
                                static::CURRENT_DEBT,
                                static::CURRENT_OVERDUE_DEBT,
                                static::OVERDUE_TIME,
                                Dictionaries\Flag::YES(),
                                Dictionaries\Flag::YES(),
                                Dictionaries\Flag::NO(),
                                Carbon::parse(static::PAYMENT_DATE),
                                Carbon::parse(static::ACTUAL_END_DATE)
                            )
                        ]),
                        static::INN,
                        static::PATRONYMIC,
                        static::SOURCE
                    )
                ],
            ],
            $this->fakeCreditsInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Blocks\CreditsInformation::TAG,
            $this->fakeCreditsInformation->tag()
        );
    }

    public function testGetCreditCollection(): void
    {
        $this->assertEquals(
            new Collections\CreditDeals([
                new Elements\CreditDeal(
                    static::ID,
                    Dictionaries\Language::RUS(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                    Dictionaries\CollateralType::R_1(),
                    Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
                    Dictionaries\Currency::UAH(),
                    static::INITIAL_AMOUNT,
                    Dictionaries\SubjectRole::BORROWER(),
                    static::COLLATERAL_COST,
                    new Collections\DealLifes([
                        new Elements\DealLife(
                            static::ID,
                            static::PERIOD_MONTH,
                            static::PERIOD_YEAR,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::END_DATE),
                            Dictionaries\DealStatus::CLOSE(),
                            static::LIMIT,
                            static::MANDATORY_PAYMENT,
                            static::CURRENT_DEBT,
                            static::CURRENT_OVERDUE_DEBT,
                            static::OVERDUE_TIME,
                            Dictionaries\Flag::YES(),
                            Dictionaries\Flag::YES(),
                            Dictionaries\Flag::NO(),
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
