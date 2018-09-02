<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Export;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class ConverterTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass Export\Converter
 * @internal
 */
class ConverterTest extends TestCase
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
    protected const SUBJECT_STATUS = 1;
    protected const COURT_DEAL_TYPE = 2;
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
    protected const TYPE = 1;
    protected const STATUS = 2;
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION = 1;
    protected const DECISION_DATE = '2018-03-12';
    protected const VALUE = 'testValue';

    /** @var Export\Converter */
    protected $fakeConverter;

    protected function setUp(): void
    {
        $this->fakeConverter = new Export\Converter();
    }

    public function testDataDocumentToXml(): void
    {
        $document = new Export\DataDocument(
            'tech',
            new Blocks\Identification(
                new Blocks\Entities\Credential(
                    References\Language::RUS(),
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    new Blocks\Collections\Identifiers([
                        new Blocks\Entities\NaturalIdentifier(
                            Carbon::parse(static::CREATED_AT),
                            References\Language::KAZ(),
                            static::NAME,
                            static::SURNAME,
                            Carbon::parse(static::BIRTH_DATE),
                            References\Gender::MAN(),
                            static::INN,
                            static::PATRONYMIC,
                            References\FamilyStatus::SINGLE(),
                            References\Education::SECONDARY(),
                            References\Nationality::RUSSIAN_FEDERATION(),
                            References\RegistrationSpd::BUSINESS(),
                            References\SocialStatus::STUDENT(),
                            static::CHILDREN_COUNT
                        ),
                        new Blocks\Entities\LegalIdentifier(
                            Carbon::parse(static::CREATED_AT),
                            References\Language::RUS(),
                            static::NAME,
                            static::ERGPOU,
                            static::FORM,
                            static::ECONOMY_BRANCH,
                            static::ACTIVITY_TYPE,
                            Carbon::parse(static::EDR_REGISTRATION_DATE),
                            Carbon::parse(static::TAX_REGISTRATION_DATE)
                        ),
                    ]),
                    new Blocks\Collections\Documents([
                        new Blocks\Entities\Document(
                            Carbon::parse(static::CREATED_AT),
                            References\Language::RUS(),
                            References\DocumentType::DIPLOMA(),
                            static::SERIAL,
                            static::NUMBER,
                            static::ISSUE,
                            Carbon::parse(static::ISSUE_DATE),
                            Carbon::parse(static::TERMIN)
                        ),
                    ]),
                    new Blocks\Collections\Addresses([
                        new Blocks\Entities\Address(
                            Carbon::parse(static::CREATED_AT),
                            References\Language::RUS(),
                            References\AddressType::REGISTRATION(),
                            static::COUNTRY,
                            static::CITY,
                            static::STREET,
                            static::HOUSE,
                            static::INDEX,
                            static::STATE,
                            static::AREA,
                            References\CityType::SETTLEMENT(),
                            static::CORPUS,
                            static::FLAT,
                            static::FULL_ADDRESS
                        ),
                    ]),
                    static::INN,
                    new Blocks\Collections\Works([
                        new Blocks\Entities\Work(
                            Carbon::parse(static::CREATED_AT),
                            References\Language::RUS(),
                            static::ERGPOU,
                            static::NAME,
                            References\IdentifierRank::DIRECTOR(),
                            static::EXPERIENCE,
                            static::INCOME
                        ),
                    ]),
                    new Blocks\Collections\Photos([
                        new Blocks\Entities\Photo(
                            Carbon::parse(static::CREATED_AT),
                            static::PHOTO,
                            static::INN
                        ),
                    ]),
                    new Blocks\Collections\LinkedPersons([
                        new Blocks\Entities\LinkedPerson(
                            static::NAME,
                            References\LinkedIdentifierRole::DIRECTOR(),
                            Carbon::parse(static::ISSUE_DATE),
                            static::ERGPOU
                        ),
                    ])
                )
            ),
            new Blocks\CreditsInformation(
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
            ),
            new Blocks\CourtDecisionsInformation(
                new Blocks\Collections\CourtDecisions([
                    new Blocks\Entities\CourtDecision(
                        static::ID,
                        static::INN,
                        Carbon::parse(static::DATE),
                        static::SUBJECT_STATUS,
                        static::COURT_DEAL_TYPE,
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
                new Blocks\Collections\CreditRegisters([
                    new Blocks\Entities\CreditRegister(
                        Carbon::parse(static::DATE),
                        static::INN,
                        static::ID,
                        References\Decision::POSITIVE(),
                        static::REASON,
                        static::ORGANIZATION
                    )
                ]),
                new Blocks\Entities\RegistryTimes(
                    static::BY_HOUR,
                    static::BY_DAY,
                    static::BY_WEEK,
                    static::BY_MONTH,
                    static::BY_QUARTER,
                    static::BY_YEAR,
                    static::BY_MORE_YEAR
                )
            ),
            new Blocks\InsurancesInformation(
                new Blocks\Collections\Insurance\Deals([
                    new Blocks\Entities\Insurance\Deal(
                        static::INN,
                        static::ID,
                        Carbon::parse(static::INFORMATION_DATE),
                        Carbon::parse(static::START_DATE),
                        Carbon::parse(static::END_DATE),
                        static::TYPE,
                        static::STATUS,
                        new Blocks\Collections\Insurance\Events([
                            new Blocks\Entities\Insurance\Event(
                                Carbon::parse(static::REQUEST_DATE),
                                static::DECISION,
                                Carbon::parse(static::DECISION_DATE)
                            )
                        ]),
                        Carbon::parse(static::ACTUAL_END_DATE)
                    )
                ])
            ),
            new Blocks\ContactsInformation(
                new Blocks\Collections\Contacts([
                    new Blocks\Entities\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        References\ContactType::EMAIL(),
                        static::INN
                    ),
                    new Blocks\Entities\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        References\ContactType::MOBILE(),
                        static::INN
                    )
                ])
            )
        );

    }
}
