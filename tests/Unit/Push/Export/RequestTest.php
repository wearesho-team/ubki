<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Export;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Export
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Export\Request
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

    /** @var Ubki\Push\Export\Request */
    protected $fakeRequest;

    protected function setUp(): void
    {
        $this->fakeRequest = new Ubki\Push\Export\Request(
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::EXPORT(),
                Ubki\Dictionaries\RequestReason::EXPORT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            new Ubki\Push\Export\DataDocument(
                new Ubki\Data\Blocks\Identification(
                    new Ubki\Data\Elements\Credential(
                        Ubki\Dictionaries\Language::RUS(),
                        static::NAME,
                        static::PATRONYMIC,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        new Ubki\Data\Collections\IdentifiedPersons([
                            new Ubki\Data\Elements\NaturalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::KAZ(),
                                static::NAME,
                                static::SURNAME,
                                Carbon::parse(static::BIRTH_DATE),
                                Ubki\Dictionaries\Gender::MAN(),
                                static::INN,
                                static::PATRONYMIC,
                                Ubki\Dictionaries\FamilyStatus::SINGLE(),
                                Ubki\Dictionaries\Education::SECONDARY(),
                                Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                                Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
                                Ubki\Dictionaries\SocialStatus::STUDENT(),
                                static::CHILDREN_COUNT
                            ),
                            new Ubki\Data\Elements\LegalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                static::NAME,
                                static::ERGPOU,
                                static::FORM,
                                static::ECONOMY_BRANCH,
                                static::ACTIVITY_TYPE,
                                Carbon::parse(static::EDR_REGISTRATION_DATE),
                                Carbon::parse(static::TAX_REGISTRATION_DATE)
                            ),
                        ]),
                        new Ubki\Data\Collections\Documents([
                            new Ubki\Data\Elements\Document(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                Ubki\Dictionaries\DocumentType::DIPLOMA(),
                                static::SERIAL,
                                static::NUMBER,
                                static::ISSUE,
                                Carbon::parse(static::ISSUE_DATE),
                                Carbon::parse(static::TERMIN)
                            ),
                        ]),
                        new Ubki\Data\Collections\Addresses([
                            new Ubki\Data\Elements\Address(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                Ubki\Dictionaries\AddressType::REGISTRATION(),
                                static::COUNTRY,
                                static::CITY,
                                static::STREET,
                                static::HOUSE,
                                static::INDEX,
                                static::STATE,
                                static::AREA,
                                Ubki\Dictionaries\CityType::SETTLEMENT(),
                                static::CORPUS,
                                static::FLAT,
                                static::FULL_ADDRESS
                            ),
                        ]),
                        static::INN,
                        new Ubki\Data\Collections\Works([
                            new Ubki\Data\Elements\Work(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                static::ERGPOU,
                                static::NAME,
                                Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                                static::EXPERIENCE,
                                static::INCOME
                            ),
                        ]),
                        new Ubki\Data\Collections\Photos([
                            new Ubki\Data\Elements\Photo(
                                Carbon::parse(static::CREATED_AT),
                                static::PHOTO,
                                static::INN
                            ),
                        ]),
                        new Ubki\Data\Collections\LinkedPersons([
                            new Ubki\Data\Elements\LinkedPerson(
                                static::NAME,
                                Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                                Carbon::parse(static::ISSUE_DATE),
                                static::ERGPOU
                            ),
                        ])
                    )
                ),
                new Ubki\Data\Blocks\CreditsInformation(
                    new Ubki\Data\Collections\CreditDeals([
                        new Ubki\Data\Elements\CreditDeal(
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
                        )
                    ])
                ),
                new Ubki\Data\Blocks\ContactsInformation(
                    new Ubki\Data\Collections\Contacts([
                        new Ubki\Data\Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionaries\ContactType::EMAIL(),
                            static::INN
                        ),
                        new Ubki\Data\Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionaries\ContactType::MOBILE(),
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
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::EXPORT(),
                Ubki\Dictionaries\RequestReason::EXPORT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            $this->fakeRequest->getHead()
        );
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            new Ubki\Push\Export\DataDocument(
                new Ubki\Data\Blocks\Identification(
                    new Ubki\Data\Elements\Credential(
                        Ubki\Dictionaries\Language::RUS(),
                        static::NAME,
                        static::PATRONYMIC,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        new Ubki\Data\Collections\IdentifiedPersons([
                            new Ubki\Data\Elements\NaturalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::KAZ(),
                                static::NAME,
                                static::SURNAME,
                                Carbon::parse(static::BIRTH_DATE),
                                Ubki\Dictionaries\Gender::MAN(),
                                static::INN,
                                static::PATRONYMIC,
                                Ubki\Dictionaries\FamilyStatus::SINGLE(),
                                Ubki\Dictionaries\Education::SECONDARY(),
                                Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                                Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
                                Ubki\Dictionaries\SocialStatus::STUDENT(),
                                static::CHILDREN_COUNT
                            ),
                            new Ubki\Data\Elements\LegalPerson(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                static::NAME,
                                static::ERGPOU,
                                static::FORM,
                                static::ECONOMY_BRANCH,
                                static::ACTIVITY_TYPE,
                                Carbon::parse(static::EDR_REGISTRATION_DATE),
                                Carbon::parse(static::TAX_REGISTRATION_DATE)
                            ),
                        ]),
                        new Ubki\Data\Collections\Documents([
                            new Ubki\Data\Elements\Document(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                Ubki\Dictionaries\DocumentType::DIPLOMA(),
                                static::SERIAL,
                                static::NUMBER,
                                static::ISSUE,
                                Carbon::parse(static::ISSUE_DATE),
                                Carbon::parse(static::TERMIN)
                            ),
                        ]),
                        new Ubki\Data\Collections\Addresses([
                            new Ubki\Data\Elements\Address(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                Ubki\Dictionaries\AddressType::REGISTRATION(),
                                static::COUNTRY,
                                static::CITY,
                                static::STREET,
                                static::HOUSE,
                                static::INDEX,
                                static::STATE,
                                static::AREA,
                                Ubki\Dictionaries\CityType::SETTLEMENT(),
                                static::CORPUS,
                                static::FLAT,
                                static::FULL_ADDRESS
                            ),
                        ]),
                        static::INN,
                        new Ubki\Data\Collections\Works([
                            new Ubki\Data\Elements\Work(
                                Carbon::parse(static::CREATED_AT),
                                Ubki\Dictionaries\Language::RUS(),
                                static::ERGPOU,
                                static::NAME,
                                Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                                static::EXPERIENCE,
                                static::INCOME
                            ),
                        ]),
                        new Ubki\Data\Collections\Photos([
                            new Ubki\Data\Elements\Photo(
                                Carbon::parse(static::CREATED_AT),
                                static::PHOTO,
                                static::INN
                            ),
                        ]),
                        new Ubki\Data\Collections\LinkedPersons([
                            new Ubki\Data\Elements\LinkedPerson(
                                static::NAME,
                                Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                                Carbon::parse(static::ISSUE_DATE),
                                static::ERGPOU
                            ),
                        ])
                    )
                ),
                new Ubki\Data\Blocks\CreditsInformation(
                    new Ubki\Data\Collections\CreditDeals([
                        new Ubki\Data\Elements\CreditDeal(
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
                        )
                    ])
                ),
                new Ubki\Data\Blocks\ContactsInformation(
                    new Ubki\Data\Collections\Contacts([
                        new Ubki\Data\Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionaries\ContactType::EMAIL(),
                            static::INN
                        ),
                        new Ubki\Data\Elements\Contact(
                            Carbon::parse(static::CREATED_AT),
                            static::VALUE,
                            Ubki\Dictionaries\ContactType::MOBILE(),
                            static::INN
                        )
                    ])
                )
            ),
            $this->fakeRequest->getBody()
        );
    }
}
