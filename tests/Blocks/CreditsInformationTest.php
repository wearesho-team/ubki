<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\References;

/**
 * Class CreditsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\CreditsInformation
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

    /** @var Data\CreditsInformation */
    protected $fakeCreditsInformation;

    protected function setUp(): void
    {
        $this->fakeCreditsInformation = new Data\CreditsInformation(
            new Data\Collections\CreditDeals([
                new Data\Elements\CreditDeal(
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
                    new Data\Collections\DealLifes([
                        new Data\Elements\DealLife(
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

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'credits' => [
                    [
                        'id' => static::ID,
                        'inn' => static::INN,
                        'language' => References\Language::RUS()->getKey(),
                        'name' => static::NAME,
                        'surname' => static::SURNAME,
                        'patronymic' => static::PATRONYMIC,
                        'birthDate' => static::BIRTH_DATE,
                        'type' => References\CreditDealType::COMMERCIAL_CREDIT()->getKey(),
                        'collateral' => References\CollateralType::R_1()->getKey(),
                        'repaymentProcedure' => References\RepaymentProcedure::PERIODIC_MONTH()->getKey(),
                        'currency' => References\Currency::UAH()->getKey(),
                        'initialAmount' => static::INITIAL_AMOUNT,
                        'subjectRole' => References\SubjectRole::BORROWER()->getKey(),
                        'collateralCost' => static::COLLATERAL_COST,
                        'dealLifes' => [
                            [
                                'id' => static::ID,
                                'periodMonth' => static::PERIOD_MONTH,
                                'periodYear' => static::PERIOD_YEAR,
                                'issueDate' => static::ISSUE_DATE,
                                'endDate' => static::END_DATE,
                                'status' => References\DealStatus::CLOSE()->getKey(),
                                'limit' => static::LIMIT,
                                'mandatoryPayment' => static::MANDATORY_PAYMENT,
                                'currentDebt' => static::CURRENT_DEBT,
                                'currentOverdueDebt' => static::CURRENT_OVERDUE_DEBT,
                                'overdueTime' => static::OVERDUE_TIME,
                                'paymentIndication' => References\Flag::YES()->getKey(),
                                'delayIndication' => References\Flag::YES()->getKey(),
                                'creditTrancheIndication' => References\Flag::NO()->getKey(),
                                'paymentDate' => static::PAYMENT_DATE,
                                'actualEndDate' => static::ACTUAL_END_DATE,
                            ]
                        ],
                        'source' => static::SOURCE
                    ],
                ],
            ],
            $this->fakeCreditsInformation->jsonSerialize()
        );
    }

    public function testGetCreditCollection(): void
    {
        $this->assertEquals(
            new Data\Collections\CreditDeals([
                new Data\Elements\CreditDeal(
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
                    new Data\Collections\DealLifes([
                        new Data\Elements\DealLife(
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
