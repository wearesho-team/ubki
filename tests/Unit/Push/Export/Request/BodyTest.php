<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Export\Request;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class BodyTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Export\Request
 */
class BodyTest extends TestCase
{
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
    protected const SCORE = 'testScore';
    protected const PREVIOUS_SCORE = 'testPreviousScore';
    protected const DATE = '2018-03-12';
    protected const PREVIOUS_DATE = '2017-03-12';
    protected const LEVEL = 'testLevel';
    protected const CREDITS_COUNT = 200;
    protected const OPENED_CREDITS_COUNT = 10;
    protected const OPENED_CREDIT_DESCRIPTION = 'testDescription';
    protected const CLOSED_CREDITS_COUNT = 50;
    protected const EXPIRES = 'testExpires';
    protected const MAX_OVERDUE = 'testMaxOverdue';
    protected const UPDATED_AT = '2018-03-12';
    protected const TEXT = 'testText';
    protected const ID = 'testId';
    protected const COUNT = 1;
    protected const DESCRIPTION = 'testDescription';
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
    protected const COURT_NAME = 'testCourtName';
    protected const DOCUMENT_TYPE = 'testDocumentType';
    protected const DOCUMENT_TYPE_REFERENCE = 'testDocumentTypeReference';
    protected const LEGAL_FACT = 'testLegalFact';
    protected const LEGAL_FACT_REFERENCE = 'testLegalFactReference';
    protected const AREA_REFERENCE = 'testAreaReference';
    protected const REASON = 1;
    protected const ORGANIZATION = 'testOrganization';
    protected const REGISTRY_TIMES = 'testTimes';
    protected const BY_HOUR = 1;
    protected const BY_DAY = 2;
    protected const BY_WEEK = 3;
    protected const BY_MONTH = 4;
    protected const BY_QUARTER = 5;
    protected const BY_YEAR = 10;
    protected const BY_MORE_YEAR = 200;
    protected const INFORMATION_DATE = '2018-03-12';
    protected const START_DATE = '2017-03-12';
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION_DATE = '2018-03-12';
    protected const VALUE = 'testValue';

    /** @var Ubki\Push\Export\Request\Body */
    protected $fakeDataDocument;

    protected function setUp(): void
    {
        $this->fakeDataDocument = new Ubki\Push\Export\Request\Body(
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
            ]),
            new Ubki\Data\Collection\CourtDecision([
                new Ubki\Data\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionary\CourtSubject::PLAINTIFF(),
                    Ubki\Dictionary\CourtDeal::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    static::DOCUMENT_TYPE_REFERENCE,
                    static::LEGAL_FACT,
                    static::LEGAL_FACT_REFERENCE,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA,
                    static::AREA_REFERENCE
                )
            ]),
            new Ubki\Data\Collection\CreditRequest([
                new Ubki\Data\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Ubki\Dictionary\Decision::POSITIVE(),
                    Ubki\Dictionary\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            new Ubki\Data\RegistryTimes(
                static::BY_HOUR,
                static::BY_DAY,
                static::BY_WEEK,
                static::BY_MONTH,
                static::BY_QUARTER,
                static::BY_YEAR,
                static::BY_MORE_YEAR
            )
        );
    }

    public function testGetContacts(): void
    {
        $this->assertEquals(
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
            ]),
            $this->fakeDataDocument->getContacts()
        );
    }

    public function testGetIdentification(): void
    {
        $this->assertEquals(
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
            $this->fakeDataDocument->getCredential()
        );
    }

    public function testGetCreditDeals(): void
    {
        $this->assertEquals(
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
            $this->fakeDataDocument->getCreditDeals()
        );
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\CreditRequest([
                new Ubki\Data\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Ubki\Dictionary\Decision::POSITIVE(),
                    Ubki\Dictionary\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            $this->fakeDataDocument->getCreditRequests()
        );
    }

    public function testGetRegistryTimes(): void
    {
        $this->assertEquals(
            new Ubki\Data\RegistryTimes(
                static::BY_HOUR,
                static::BY_DAY,
                static::BY_WEEK,
                static::BY_MONTH,
                static::BY_QUARTER,
                static::BY_YEAR,
                static::BY_MORE_YEAR
            ),
            $this->fakeDataDocument->getRegistryTimes()
        );
    }

    public function testGetCourtDecisions(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\CourtDecision([
                new Ubki\Data\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionary\CourtSubject::PLAINTIFF(),
                    Ubki\Dictionary\CourtDeal::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    static::DOCUMENT_TYPE_REFERENCE,
                    static::LEGAL_FACT,
                    static::LEGAL_FACT_REFERENCE,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA,
                    static::AREA_REFERENCE
                )
            ]),
            $this->fakeDataDocument->getCourtDecisions()
        );
    }
}
