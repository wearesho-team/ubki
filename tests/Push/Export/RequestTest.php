<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Push\Export;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass Export\Request
 * @internal
 */
class RequestTest extends TestCase
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

    /** @var Export\Request */
    protected $fakeRequest;

    protected function setUp(): void
    {
        $this->fakeRequest = new Export\Request(
            new Elements\RequestData(
                Dictionaries\RequestType::EXPORT(),
                Dictionaries\RequestReason::EXPORT(),
                Carbon::parse(static::DATE),
                static::ID,
                Dictionaries\RequestInitiator::PARTNER()
            ),
            new Export\DataDocument(
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
                            new Elements\LinkedPerson(
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
                )
            )
        );
    }

    public function testGetHead(): void
    {
        $this->assertEquals(
            new Elements\RequestData(
                Dictionaries\RequestType::EXPORT(),
                Dictionaries\RequestReason::EXPORT(),
                Carbon::parse(static::DATE),
                static::ID,
                Dictionaries\RequestInitiator::PARTNER()
            ),
            $this->fakeRequest->getHead()
        );
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            new Export\DataDocument(
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
                            new Elements\LinkedPerson(
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
                )
            ),
            $this->fakeRequest->getBody()
        );
    }
}
