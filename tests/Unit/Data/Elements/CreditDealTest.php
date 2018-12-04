<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CreditDealTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CreditDeal
 * @internal
 */
class CreditDealTest extends TestCase
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

    /** @var Ubki\Data\Elements\CreditDeal */
    protected $fakeCreditDeal;

    protected function setUp(): void
    {
        $this->fakeCreditDeal = new Ubki\Data\Elements\CreditDeal(
            static::ID,
            Ubki\Dictionaries\Language::RUS(),
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            Ubki\Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
            Ubki\Dictionaries\CollateralType::R_1(),
            Ubki\Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
            Ubki\Dictionaries\Currency::UAH(),
            static::INITIAL_AMOUNT,
            Ubki\Dictionaries\SubjectRole::BORROWER(),
            static::COLLATERAL_COST,
            new Ubki\Data\Collections\DealLifes([
                new Ubki\Data\Elements\DealLife(
                    static::ID,
                    static::PERIOD_MONTH,
                    static::PERIOD_YEAR,
                    Carbon::parse(static::ISSUE_DATE),
                    Carbon::parse(static::END_DATE),
                    Ubki\Dictionaries\DealStatus::CLOSE(),
                    static::LIMIT,
                    static::MANDATORY_PAYMENT,
                    static::CURRENT_DEBT,
                    static::CURRENT_OVERDUE_DEBT,
                    static::OVERDUE_TIME,
                    Ubki\Dictionaries\Flag::YES(),
                    Ubki\Dictionaries\Flag::YES(),
                    Ubki\Dictionaries\Flag::NO(),
                    Carbon::parse(static::PAYMENT_DATE),
                    Carbon::parse(static::ACTUAL_END_DATE)
                )
            ]),
            static::INN,
            static::PATRONYMIC,
            static::SOURCE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\CreditDeal::ID => static::ID,
                Ubki\Data\Interfaces\CreditDeal::INN => static::INN,
                Ubki\Data\Interfaces\CreditDeal::LANGUAGE => Ubki\Dictionaries\Language::RUS(),
                Ubki\Data\Interfaces\CreditDeal::NAME => static::NAME,
                Ubki\Data\Interfaces\CreditDeal::SURNAME => static::SURNAME,
                Ubki\Data\Interfaces\CreditDeal::PATRONYMIC => static::PATRONYMIC,
                Ubki\Data\Interfaces\CreditDeal::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                Ubki\Data\Interfaces\CreditDeal::TYPE => Ubki\Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                Ubki\Data\Interfaces\CreditDeal::COLLATERAL => Ubki\Dictionaries\CollateralType::R_1(),
                Ubki\Data\Interfaces\CreditDeal::REPAYMENT_PROCEDURE =>
                    Ubki\Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
                Ubki\Data\Interfaces\CreditDeal::CURRENCY => Ubki\Dictionaries\Currency::UAH(),
                Ubki\Data\Interfaces\CreditDeal::INITIAL_AMOUNT => static::INITIAL_AMOUNT,
                Ubki\Data\Interfaces\CreditDeal::SUBJECT_ROLE => Ubki\Dictionaries\SubjectRole::BORROWER(),
                Ubki\Data\Interfaces\CreditDeal::COLLATERAL_COST => static::COLLATERAL_COST,
                Ubki\Data\Interfaces\CreditDeal::SOURCE => static::SOURCE,
                'dealLifes' => [
                    new Ubki\Data\Elements\DealLife(
                        static::ID,
                        static::PERIOD_MONTH,
                        static::PERIOD_YEAR,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::END_DATE),
                        Ubki\Dictionaries\DealStatus::CLOSE(),
                        static::LIMIT,
                        static::MANDATORY_PAYMENT,
                        static::CURRENT_DEBT,
                        static::CURRENT_OVERDUE_DEBT,
                        static::OVERDUE_TIME,
                        Ubki\Dictionaries\Flag::YES(),
                        Ubki\Dictionaries\Flag::YES(),
                        Ubki\Dictionaries\Flag::NO(),
                        Carbon::parse(static::PAYMENT_DATE),
                        Carbon::parse(static::ACTUAL_END_DATE)
                    )
                ],
            ],
            $this->fakeCreditDeal->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\CreditDeal::TAG,
            $this->fakeCreditDeal->tag()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            Carbon::instance($this->fakeCreditDeal->getBirthDate())->toDateString()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeCreditDeal->getId()
        );
    }

    public function testGetInitialAmount(): void
    {
        $this->assertEquals(
            static::INITIAL_AMOUNT,
            $this->fakeCreditDeal->getInitialAmount()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeCreditDeal->getSurname()
        );
    }

    public function testGetCollateral(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\CollateralType::R_1(),
            $this->fakeCreditDeal->getCollateral()
        );
    }

    public function testGetSource(): void
    {
        $this->assertEquals(
            static::SOURCE,
            $this->fakeCreditDeal->getSource()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeCreditDeal->getInn()
        );
    }

    public function testGetSubjectRole(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\SubjectRole::BORROWER(),
            $this->fakeCreditDeal->getSubjectRole()
        );
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Currency::UAH(),
            $this->fakeCreditDeal->getCurrency()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Language::RUS(),
            $this->fakeCreditDeal->getLanguage()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
            $this->fakeCreditDeal->getType()
        );
    }

    public function testGetRepaymentProcedure(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
            $this->fakeCreditDeal->getRepaymentProcedure()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeCreditDeal->getName()
        );
    }

    public function testGetCollateralCost(): void
    {
        $this->assertEquals(
            static::COLLATERAL_COST,
            $this->fakeCreditDeal->getCollateralCost()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeCreditDeal->getPatronymic()
        );
    }

    public function testGetDealLifeCollection(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\DealLifes([
                new Ubki\Data\Elements\DealLife(
                    static::ID,
                    static::PERIOD_MONTH,
                    static::PERIOD_YEAR,
                    Carbon::parse(static::ISSUE_DATE),
                    Carbon::parse(static::END_DATE),
                    Ubki\Dictionaries\DealStatus::CLOSE(),
                    static::LIMIT,
                    static::MANDATORY_PAYMENT,
                    static::CURRENT_DEBT,
                    static::CURRENT_OVERDUE_DEBT,
                    static::OVERDUE_TIME,
                    Ubki\Dictionaries\Flag::YES(),
                    Ubki\Dictionaries\Flag::YES(),
                    Ubki\Dictionaries\Flag::NO(),
                    Carbon::parse(static::PAYMENT_DATE),
                    Carbon::parse(static::ACTUAL_END_DATE)
                )
            ]),
            $this->fakeCreditDeal->getDealLifeCollection()
        );
    }
}
