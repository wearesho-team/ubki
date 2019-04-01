<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Exception;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class FormerTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Exception
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Exception\Request\Former
 * @internal
 */
class FormerTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';
    protected const NAME = 'testName';
    protected const CREATED_AT = '2018-03-12';
    protected const INN = 'testInn';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '1998-03-12';
    protected const CHILDREN_COUNT = 2;
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';
    protected const ISSUE = 'testIssue';
    protected const ISSUE_DATE = '2018-03-14';
    protected const TERMIN = '2020-01-01';
    protected const COUNTRY = 'testCountry';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = 'testIndex';
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';
    protected const ERGPOU = 'testErgpou';
    protected const EXPERIENCE = 10;
    protected const INCOME = 1234.56;
    protected const PHOTO = 'testPhoto';
    protected const FORM = 1;
    protected const ECONOMY_BRANCH = 'testBranch';
    protected const ACTIVITY_TYPE = 'testActivityType';
    protected const EDR_REGISTRATION_DATE = '2017-03-12';
    protected const TAX_REGISTRATION_DATE = '2016-03-12';
    protected const INITIAL_AMOUNT = 5000.00;
    protected const COLLATERAL_COST = 5000.00;
    protected const PERIOD_MONTH = 4;
    protected const PERIOD_YEAR = 2012;
    protected const END_DATE = '2019-03-12';
    protected const LIMIT = 10000;
    protected const MANDATORY_PAYMENT = 2000;
    protected const CURRENT_DEBT = 2400.45;
    protected const CURRENT_OVERDUE_DEBT = 2200;
    protected const OVERDUE_TIME = 20;
    protected const PAYMENT_DATE = '2018-03-12';
    protected const ACTUAL_END_DATE = '2019-02-01';
    protected const SOURCE = 'testSource';
    protected const VALUE = 'testValue';

    /** @var Ubki\Exception\Request\Former */
    protected $fakeFormer;

    protected function setUp(): void
    {
        $this->fakeFormer = new Ubki\Exception\Request\Former(
            new Ubki\Push\Export\Request(
                new Ubki\Push\Export\Request\Head(
                    Ubki\Push\Export\Request\Type::EXPORT(),
                    Ubki\Dictionary\RequestReason::EXPORT(),
                    Carbon::parse(static::DATE),
                    static::ID,
                    Ubki\Dictionary\RequestInitiator::PARTNER()
                ),
                new Ubki\Push\Export\Request\Body(
                    new Ubki\Data\Credential(
                        Ubki\Dictionary\Language::RUS(),
                        static::NAME,
                        static::PATRONYMIC,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        new Ubki\Data\Collection\IdentifiedPerson([
                            new Ubki\Data\NaturalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::KAZ(),
                                static::NAME,
                                static::SURNAME,
                                Carbon::parse(static::BIRTH_DATE),
                                Ubki\Dictionary\Gender::MAN(),
                                static::INN,
                                static::PATRONYMIC,
                                Ubki\Dictionary\FamilyStatus::SINGLE(),
                                Ubki\Dictionary\Education::SECONDARY(),
                                Ubki\Dictionary\Nationality::RUSSIAN_FEDERATION(),
                                Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                                Ubki\Dictionary\SocialStatus::STUDENT(),
                                static::CHILDREN_COUNT
                            ),
                            new Ubki\Data\LegalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                static::NAME,
                                static::ERGPOU,
                                Ubki\Dictionary\Ownership::BRANCH(),
                                Ubki\Dictionary\EconomyBranch::BUILDING(),
                                static::ACTIVITY_TYPE,
                                Carbon::parse(static::EDR_REGISTRATION_DATE),
                                Carbon::parse(static::TAX_REGISTRATION_DATE)
                            ),
                        ]),
                        new Ubki\Data\Collection\Document([
                            new Ubki\Data\Document(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                Ubki\Dictionary\Document::DIPLOMA(),
                                static::SERIAL,
                                static::NUMBER,
                                static::ISSUE,
                                Carbon::parse(static::ISSUE_DATE),
                                Carbon::parse(static::TERMIN)
                            ),
                        ]),
                        new Ubki\Data\Collection\Address([
                            new Ubki\Data\Address(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                Ubki\Dictionary\Address::REGISTRATION(),
                                static::COUNTRY,
                                static::CITY,
                                static::STREET,
                                static::HOUSE,
                                static::INDEX,
                                static::STATE,
                                static::AREA,
                                Ubki\Dictionary\City::SETTLEMENT(),
                                static::CORPUS,
                                static::FLAT,
                                static::FULL_ADDRESS
                            ),
                        ]),
                        static::INN,
                        new Ubki\Data\Collection\Work([
                            new Ubki\Data\Work(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                static::ERGPOU,
                                static::NAME,
                                Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                                static::EXPERIENCE,
                                static::INCOME
                            ),
                        ]),
                        new Ubki\Data\Collection\Photo([
                            new Ubki\Data\Photo(
                                Carbon::parse(static::CREATED_AT),
                                static::PHOTO,
                                static::INN
                            ),
                        ]),
                        new Ubki\Data\Collection\LinkedPerson([
                            new Ubki\Data\LinkedPerson(
                                static::NAME,
                                Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                                Carbon::parse(static::ISSUE_DATE),
                                static::ERGPOU
                            ),
                        ])
                    ),
                    new Ubki\Data\Collection\CreditDeal([
                        new Ubki\Data\CreditDeal(
                            static::ID,
                            Ubki\Dictionary\Language::RUS(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            Ubki\Dictionary\CreditDeal::COMMERCIAL_CREDIT(),
                            Ubki\Dictionary\Collateral::LEGAL(),
                            Ubki\Dictionary\RepaymentProcedure::PERIODIC_MONTH(),
                            Ubki\Dictionary\Currency::UAH(),
                            static::INITIAL_AMOUNT,
                            Ubki\Dictionary\SubjectRole::BORROWER(),
                            static::COLLATERAL_COST,
                            new Ubki\Data\Collection\DealLife([
                                new Ubki\Data\DealLife(
                                    static::ID,
                                    static::PERIOD_MONTH,
                                    static::PERIOD_YEAR,
                                    Carbon::parse(static::ISSUE_DATE),
                                    Carbon::parse(static::END_DATE),
                                    Ubki\Dictionary\DealStatus::CLOSE(),
                                    static::LIMIT,
                                    static::MANDATORY_PAYMENT,
                                    static::CURRENT_DEBT,
                                    static::CURRENT_OVERDUE_DEBT,
                                    static::OVERDUE_TIME,
                                    Ubki\Dictionary\Flag::YES(),
                                    Ubki\Dictionary\Flag::YES(),
                                    Ubki\Dictionary\Flag::NO(),
                                    Carbon::parse(static::PAYMENT_DATE),
                                    Carbon::parse(static::ACTUAL_END_DATE)
                                )
                            ]),
                            static::INN,
                            static::PATRONYMIC,
                            static::SOURCE
                        )
                    ]),
                    new Ubki\Data\Collection\Contact([
                        new Ubki\Data\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionary\Contact::EMAIL(),
                            static::INN
                        ),
                        new Ubki\Data\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionary\Contact::MOBILE(),
                            static::INN
                        )
                    ])
                )
            )
        );
    }

    public function testGetRequest(): void
    {
        $this->assertEquals(
            new Ubki\Push\Export\Request(
                new Ubki\Push\Export\Request\Head(
                    Ubki\Push\Export\Request\Type::EXPORT(),
                    Ubki\Dictionary\RequestReason::EXPORT(),
                    Carbon::parse(static::DATE),
                    static::ID,
                    Ubki\Dictionary\RequestInitiator::PARTNER()
                ),
                new Ubki\Push\Export\Request\Body(
                    new Ubki\Data\Credential(
                        Ubki\Dictionary\Language::RUS(),
                        static::NAME,
                        static::PATRONYMIC,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        new Ubki\Data\Collection\IdentifiedPerson([
                            new Ubki\Data\NaturalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::KAZ(),
                                static::NAME,
                                static::SURNAME,
                                Carbon::parse(static::BIRTH_DATE),
                                Ubki\Dictionary\Gender::MAN(),
                                static::INN,
                                static::PATRONYMIC,
                                Ubki\Dictionary\FamilyStatus::SINGLE(),
                                Ubki\Dictionary\Education::SECONDARY(),
                                Ubki\Dictionary\Nationality::RUSSIAN_FEDERATION(),
                                Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                                Ubki\Dictionary\SocialStatus::STUDENT(),
                                static::CHILDREN_COUNT
                            ),
                            new Ubki\Data\LegalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                static::NAME,
                                static::ERGPOU,
                                Ubki\Dictionary\Ownership::BRANCH(),
                                Ubki\Dictionary\EconomyBranch::BUILDING(),
                                static::ACTIVITY_TYPE,
                                Carbon::parse(static::EDR_REGISTRATION_DATE),
                                Carbon::parse(static::TAX_REGISTRATION_DATE)
                            ),
                        ]),
                        new Ubki\Data\Collection\Document([
                            new Ubki\Data\Document(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                Ubki\Dictionary\Document::DIPLOMA(),
                                static::SERIAL,
                                static::NUMBER,
                                static::ISSUE,
                                Carbon::parse(static::ISSUE_DATE),
                                Carbon::parse(static::TERMIN)
                            ),
                        ]),
                        new Ubki\Data\Collection\Address([
                            new Ubki\Data\Address(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                Ubki\Dictionary\Address::REGISTRATION(),
                                static::COUNTRY,
                                static::CITY,
                                static::STREET,
                                static::HOUSE,
                                static::INDEX,
                                static::STATE,
                                static::AREA,
                                Ubki\Dictionary\City::SETTLEMENT(),
                                static::CORPUS,
                                static::FLAT,
                                static::FULL_ADDRESS
                            ),
                        ]),
                        static::INN,
                        new Ubki\Data\Collection\Work([
                            new Ubki\Data\Work(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionary\Language::RUS(),
                                static::ERGPOU,
                                static::NAME,
                                Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                                static::EXPERIENCE,
                                static::INCOME
                            ),
                        ]),
                        new Ubki\Data\Collection\Photo([
                            new Ubki\Data\Photo(
                                Carbon::parse(static::CREATED_AT),
                                static::PHOTO,
                                static::INN
                            ),
                        ]),
                        new Ubki\Data\Collection\LinkedPerson([
                            new Ubki\Data\LinkedPerson(
                                static::NAME,
                                Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                                Carbon::parse(static::ISSUE_DATE),
                                static::ERGPOU
                            ),
                        ])
                    ),
                    new Ubki\Data\Collection\CreditDeal([
                        new Ubki\Data\CreditDeal(
                            static::ID,
                            Ubki\Dictionary\Language::RUS(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            Ubki\Dictionary\CreditDeal::COMMERCIAL_CREDIT(),
                            Ubki\Dictionary\Collateral::LEGAL(),
                            Ubki\Dictionary\RepaymentProcedure::PERIODIC_MONTH(),
                            Ubki\Dictionary\Currency::UAH(),
                            static::INITIAL_AMOUNT,
                            Ubki\Dictionary\SubjectRole::BORROWER(),
                            static::COLLATERAL_COST,
                            new Ubki\Data\Collection\DealLife([
                                new Ubki\Data\DealLife(
                                    static::ID,
                                    static::PERIOD_MONTH,
                                    static::PERIOD_YEAR,
                                    Carbon::parse(static::ISSUE_DATE),
                                    Carbon::parse(static::END_DATE),
                                    Ubki\Dictionary\DealStatus::CLOSE(),
                                    static::LIMIT,
                                    static::MANDATORY_PAYMENT,
                                    static::CURRENT_DEBT,
                                    static::CURRENT_OVERDUE_DEBT,
                                    static::OVERDUE_TIME,
                                    Ubki\Dictionary\Flag::YES(),
                                    Ubki\Dictionary\Flag::YES(),
                                    Ubki\Dictionary\Flag::NO(),
                                    Carbon::parse(static::PAYMENT_DATE),
                                    Carbon::parse(static::ACTUAL_END_DATE)
                                )
                            ]),
                            static::INN,
                            static::PATRONYMIC,
                            static::SOURCE
                        )
                    ]),
                    new Ubki\Data\Collection\Contact([
                        new Ubki\Data\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionary\Contact::EMAIL(),
                            static::INN
                        ),
                        new Ubki\Data\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionary\Contact::MOBILE(),
                            static::INN
                        )
                    ])
                )
            ),
            $this->fakeFormer->getRequest()
        );
    }
}
