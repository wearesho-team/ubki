<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Push\Export\DataDocument;

/**
 * Class DataDocumentTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass DataDocument
 * @internal
 */
class DataDocumentTest extends TestCase
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

    /** @var DataDocument */
    protected $fakeDataDocument;

    protected function setUp(): void
    {
        $this->fakeDataDocument = new DataDocument(
            'tech',
            new Blocks\Identification(
                new Elements\Credential(
                    Dictionaries\Language::RUS(),
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    new Collections\IdentifiedPersons([
                        new Elements\NaturalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::KAZ(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            Dictionaries\Gender::MAN(),
                            static::INN,
                            static::PATRONYMIC,
                            Dictionaries\FamilyStatus::SINGLE(),
                            Dictionaries\Education::SECONDARY(),
                            Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                            Dictionaries\RegistrationSpd::BUSINESS(),
                            Dictionaries\SocialStatus::STUDENT(),
                            static::CHILDREN_COUNT
                        ),
                        new Elements\LegalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::NAME,
                            static::ERGPOU,
                            static::FORM,
                            static::ECONOMY_BRANCH,
                            static::ACTIVITY_TYPE,
                            Carbon::parse(static::EDR_REGISTRATION_DATE),
                            Carbon::parse(static::TAX_REGISTRATION_DATE)
                        ),
                    ]),
                    new Collections\Documents([
                        new Elements\Document(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\DocumentType::DIPLOMA(),
                            static::SERIAL,
                            static::NUMBER,
                            static::ISSUE,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::TERMIN)
                        ),
                    ]),
                    new Collections\Addresses([
                        new Elements\Address(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\AddressType::REGISTRATION(),
                            static::COUNTRY,
                            static::CITY,
                            static::STREET,
                            static::HOUSE,
                            static::INDEX,
                            static::STATE,
                            static::AREA,
                            Dictionaries\CityType::SETTLEMENT(),
                            static::CORPUS,
                            static::FLAT,
                            static::FULL_ADDRESS
                        ),
                    ]),
                    static::INN,
                    new Collections\Works([
                        new Elements\Work(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::ERGPOU,
                            static::NAME,
                            Dictionaries\IdentifierRank::DIRECTOR(),
                            static::EXPERIENCE,
                            static::INCOME
                        ),
                    ]),
                    new Collections\Photos([
                        new Elements\Photo(
                            Carbon::parse(static::CREATED_AT),
                            static::PHOTO,
                            static::INN
                        ),
                    ]),
                    new Collections\LinkedPersons([
                        new ELements\LinkedPerson(
                            static::NAME,
                            Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                            Carbon::parse(static::ISSUE_DATE),
                            static::ERGPOU
                        ),
                    ])
                )
            ),
            new Blocks\CreditsInformation(
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
            ),
            new Blocks\ContactsInformation(
                new Collections\Contacts([
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Dictionaries\ContactType::EMAIL(),
                        static::INN
                    ),
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Dictionaries\ContactType::MOBILE(),
                        static::INN
                    )
                ])
            ),
            new Blocks\CourtDecisionsInformation(
                new Collections\CourtDecisions([
                    new Elements\CourtDecision(
                        static::ID,
                        static::INN,
                        Carbon::parse(static::DATE),
                        Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                        Dictionaries\CourtDealType::ECONOMIC(),
                        static::COURT_NAME,
                        static::DOCUMENT_TYPE,
                        static::DOCUMENT_TYPE_REFERENCE,
                        static::LEGAL_FACT,
                        static::LEGAL_FACT_REFERENCE,
                        Carbon::parse(static::CREATED_AT),
                        static::AREA,
                        static::AREA_REFERENCE
                    )
                ])
            ),
            new Blocks\CreditsRegistersInformation(
                new Collections\CreditRegisters([
                    new Elements\CreditRequest(
                        Carbon::parse(static::DATE),
                        static::INN,
                        static::ID,
                        Dictionaries\Decision::POSITIVE(),
                        Dictionaries\RequestReason::EXPORT(),
                        static::ORGANIZATION
                    )
                ]),
                new Elements\RegistryTimes(
                    static::BY_HOUR,
                    static::BY_DAY,
                    static::BY_WEEK,
                    static::BY_MONTH,
                    static::BY_QUARTER,
                    static::BY_YEAR,
                    static::BY_MORE_YEAR
                )
            )
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'identification' => [
                    Interfaces\Credential::LANGUAGE => Dictionaries\Language::RUS(),
                    Interfaces\Credential::NAME => static::NAME,
                    Interfaces\Credential::PATRONYMIC => static::PATRONYMIC,
                    Interfaces\Credential::SURNAME => static::SURNAME,
                    Interfaces\Credential::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                    Interfaces\Credential::INN => static::INN,
                    'identifiers' => [
                        new Elements\NaturalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::KAZ(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            Dictionaries\Gender::MAN(),
                            static::INN,
                            static::PATRONYMIC,
                            Dictionaries\FamilyStatus::SINGLE(),
                            Dictionaries\Education::SECONDARY(),
                            Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                            Dictionaries\RegistrationSpd::BUSINESS(),
                            Dictionaries\SocialStatus::STUDENT(),
                            static::CHILDREN_COUNT
                        ),
                        new Elements\LegalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::NAME,
                            static::ERGPOU,
                            static::FORM,
                            static::ECONOMY_BRANCH,
                            static::ACTIVITY_TYPE,
                            Carbon::parse(static::EDR_REGISTRATION_DATE),
                            Carbon::parse(static::TAX_REGISTRATION_DATE)
                        ),
                    ],
                    'documents' => [
                        new Elements\Document(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\DocumentType::DIPLOMA(),
                            static::SERIAL,
                            static::NUMBER,
                            static::ISSUE,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::TERMIN)
                        ),
                    ],
                    'addresses' => [
                        new Elements\Address(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\AddressType::REGISTRATION(),
                            static::COUNTRY,
                            static::CITY,
                            static::STREET,
                            static::HOUSE,
                            static::INDEX,
                            static::STATE,
                            static::AREA,
                            Dictionaries\CityType::SETTLEMENT(),
                            static::CORPUS,
                            static::FLAT,
                            static::FULL_ADDRESS
                        ),
                    ],
                    'works' => [
                        new Elements\Work(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::ERGPOU,
                            static::NAME,
                            Dictionaries\IdentifierRank::DIRECTOR(),
                            static::EXPERIENCE,
                            static::INCOME
                        ),
                    ],
                    'photos' => [
                        new Elements\Photo(
                            Carbon::parse(static::CREATED_AT),
                            static::PHOTO,
                            static::INN
                        ),
                    ],
                    'linkedPersons' => [
                        new ELements\LinkedPerson(
                            static::NAME,
                            Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                            Carbon::parse(static::ISSUE_DATE),
                            static::ERGPOU
                        ),
                    ],
                ],
                'creditsInformation' => [
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
                'courtDecisionsInformation' => [
                    new Elements\CourtDecision(
                        static::ID,
                        static::INN,
                        Carbon::parse(static::DATE),
                        Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                        Dictionaries\CourtDealType::ECONOMIC(),
                        static::COURT_NAME,
                        static::DOCUMENT_TYPE,
                        static::DOCUMENT_TYPE_REFERENCE,
                        static::LEGAL_FACT,
                        static::LEGAL_FACT_REFERENCE,
                        Carbon::parse(static::CREATED_AT),
                        static::AREA,
                        static::AREA_REFERENCE
                    ),
                ],
                'creditRequestsInformation' => [
                    'requests' => [
                        new Elements\CreditRequest(
                            Carbon::parse(static::DATE),
                            static::INN,
                            static::ID,
                            Dictionaries\Decision::POSITIVE(),
                            Dictionaries\RequestReason::EXPORT(),
                            static::ORGANIZATION
                        ),
                    ],
                    'times' => [
                        Interfaces\RegistryTimes::BY_HOUR => static::BY_HOUR,
                        Interfaces\RegistryTimes::BY_DAY => static::BY_DAY,
                        Interfaces\RegistryTimes::BY_WEEK => static::BY_WEEK,
                        Interfaces\RegistryTimes::BY_MONTH => static::BY_MONTH,
                        Interfaces\RegistryTimes::BY_QUARTER => static::BY_QUARTER,
                        Interfaces\RegistryTimes::BY_YEAR => static::BY_YEAR,
                        Interfaces\RegistryTimes::BY_MORE_YEAR => static::BY_MORE_YEAR,
                    ],
                ],
                'contactsInformation' => [
                    'contacts' => [
                        new Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Dictionaries\ContactType::EMAIL(),
                            static::INN
                        ),
                        new Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Dictionaries\ContactType::MOBILE(),
                            static::INN
                        ),
                    ]
                ],
            ],
            $this->fakeDataDocument->jsonSerialize()
        );
    }

    public function testGetTech(): void
    {
        $this->assertEquals(
            'tech',
            $this->fakeDataDocument->getTech()
        );
    }

    public function testGetContacts(): void
    {
        $this->assertEquals(
            new Blocks\ContactsInformation(
                new Collections\Contacts([
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Dictionaries\ContactType::EMAIL(),
                        static::INN
                    ),
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Dictionaries\ContactType::MOBILE(),
                        static::INN
                    )
                ])
            ),
            $this->fakeDataDocument->getContacts()
        );
    }

    public function testGetIdentification(): void
    {
        $this->assertEquals(
            new Blocks\Identification(
                new Elements\Credential(
                    Dictionaries\Language::RUS(),
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    new Collections\IdentifiedPersons([
                        new Elements\NaturalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::KAZ(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            Dictionaries\Gender::MAN(),
                            static::INN,
                            static::PATRONYMIC,
                            Dictionaries\FamilyStatus::SINGLE(),
                            Dictionaries\Education::SECONDARY(),
                            Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                            Dictionaries\RegistrationSpd::BUSINESS(),
                            Dictionaries\SocialStatus::STUDENT(),
                            static::CHILDREN_COUNT
                        ),
                        new Elements\LegalPerson(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::NAME,
                            static::ERGPOU,
                            static::FORM,
                            static::ECONOMY_BRANCH,
                            static::ACTIVITY_TYPE,
                            Carbon::parse(static::EDR_REGISTRATION_DATE),
                            Carbon::parse(static::TAX_REGISTRATION_DATE)
                        ),
                    ]),
                    new Collections\Documents([
                        new Elements\Document(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\DocumentType::DIPLOMA(),
                            static::SERIAL,
                            static::NUMBER,
                            static::ISSUE,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::TERMIN)
                        ),
                    ]),
                    new Collections\Addresses([
                        new Elements\Address(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            Dictionaries\AddressType::REGISTRATION(),
                            static::COUNTRY,
                            static::CITY,
                            static::STREET,
                            static::HOUSE,
                            static::INDEX,
                            static::STATE,
                            static::AREA,
                            Dictionaries\CityType::SETTLEMENT(),
                            static::CORPUS,
                            static::FLAT,
                            static::FULL_ADDRESS
                        ),
                    ]),
                    static::INN,
                    new Collections\Works([
                        new Elements\Work(
                            Carbon::parse(static::CREATED_AT),
                            Dictionaries\Language::RUS(),
                            static::ERGPOU,
                            static::NAME,
                            Dictionaries\IdentifierRank::DIRECTOR(),
                            static::EXPERIENCE,
                            static::INCOME
                        ),
                    ]),
                    new Collections\Photos([
                        new Elements\Photo(
                            Carbon::parse(static::CREATED_AT),
                            static::PHOTO,
                            static::INN
                        ),
                    ]),
                    new Collections\LinkedPersons([
                        new Elements\LinkedPerson(
                            static::NAME,
                            Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                            Carbon::parse(static::ISSUE_DATE),
                            static::ERGPOU
                        ),
                    ])
                )
            ),
            $this->fakeDataDocument->getIdentification()
        );
    }

    public function testGetCreditDeals(): void
    {
        $this->assertEquals(
            new Blocks\CreditsInformation(
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
            ),
            $this->fakeDataDocument->getCreditDeals()
        );
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            new Blocks\CreditsRegistersInformation(
                new Collections\CreditRegisters([
                    new Elements\CreditRequest(
                        Carbon::parse(static::DATE),
                        static::INN,
                        static::ID,
                        Dictionaries\Decision::POSITIVE(),
                        Dictionaries\RequestReason::EXPORT(),
                        static::ORGANIZATION
                    )
                ]),
                new Elements\RegistryTimes(
                    static::BY_HOUR,
                    static::BY_DAY,
                    static::BY_WEEK,
                    static::BY_MONTH,
                    static::BY_QUARTER,
                    static::BY_YEAR,
                    static::BY_MORE_YEAR
                )
            ),
            $this->fakeDataDocument->getCreditRequests()
        );
    }

    public function testGetCourtDecisions(): void
    {
        $this->assertEquals(
            new Blocks\CourtDecisionsInformation(
                new Collections\CourtDecisions([
                    new Elements\CourtDecision(
                        static::ID,
                        static::INN,
                        Carbon::parse(static::DATE),
                        Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                        Dictionaries\CourtDealType::ECONOMIC(),
                        static::COURT_NAME,
                        static::DOCUMENT_TYPE,
                        static::DOCUMENT_TYPE_REFERENCE,
                        static::LEGAL_FACT,
                        static::LEGAL_FACT_REFERENCE,
                        Carbon::parse(static::CREATED_AT),
                        static::AREA,
                        static::AREA_REFERENCE
                    )
                ])
            ),
            $this->fakeDataDocument->getCourtDecisions()
        );
    }
}
