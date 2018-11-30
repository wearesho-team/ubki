<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\DealLifes;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\Interfaces\CreditDeal;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class CreditDealTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Elements\CreditDeal
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

    /** @var Elements\CreditDeal */
    protected $fakeCreditDeal;

    protected function setUp(): void
    {
        $this->fakeCreditDeal = new Elements\CreditDeal(
            static::ID,
            Dictionaries\Language::RUS(),
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
            Dictionaries\CollateralType::LEGAL(),
            Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
            Dictionaries\Currency::UAH(),
            static::INITIAL_AMOUNT,
            Dictionaries\SubjectRole::BORROWER(),
            static::COLLATERAL_COST,
            new DealLifes([
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
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                CreditDeal::ID => static::ID,
                CreditDeal::INN => static::INN,
                CreditDeal::LANGUAGE=> Dictionaries\Language::RUS(),
                CreditDeal::NAME => static::NAME,
                CreditDeal::SURNAME => static::SURNAME,
                CreditDeal::PATRONYMIC => static::PATRONYMIC,
                CreditDeal::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                CreditDeal::TYPE => Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                CreditDeal::COLLATERAL => Dictionaries\CollateralType::LEGAL(),
                CreditDeal::REPAYMENT_PROCEDURE => Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
                CreditDeal::CURRENCY => Dictionaries\Currency::UAH(),
                CreditDeal::INITIAL_AMOUNT => static::INITIAL_AMOUNT,
                CreditDeal::SUBJECT_ROLE => Dictionaries\SubjectRole::BORROWER(),
                CreditDeal::COLLATERAL_COST => static::COLLATERAL_COST,
                CreditDeal::SOURCE => static::SOURCE,
                'dealLifes' => [
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
                ],
            ],
            $this->fakeCreditDeal->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            CreditDeal::TAG,
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
            Dictionaries\CollateralType::LEGAL(),
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
            Dictionaries\SubjectRole::BORROWER(),
            $this->fakeCreditDeal->getSubjectRole()
        );
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(
            Dictionaries\Currency::UAH(),
            $this->fakeCreditDeal->getCurrency()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Dictionaries\Language::RUS(),
            $this->fakeCreditDeal->getLanguage()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
            $this->fakeCreditDeal->getType()
        );
    }

    public function testGetRepaymentProcedure(): void
    {
        $this->assertEquals(
            Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
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
            new DealLifes([
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
            $this->fakeCreditDeal->getDealLifeCollection()
        );
    }
}
