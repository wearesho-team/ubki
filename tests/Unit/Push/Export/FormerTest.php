<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Export;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data\Interfaces\RequestData;
use Wearesho\Bobra\Ubki\RequestInterface;

/**
 * Class ConverterTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Export
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Export\Former
 * @internal
 */
class FormerTest extends TestCase
{
    protected const SESSION_ID = 'testSessionId';
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

    /** @var Ubki\Push\Export\Former */
    protected $fakeFormer;

    /** @var Ubki\Push\Export\Request\Data */
    protected $fakeRequestDataBlock;

    /** @var Ubki\Data\Block\Identification */
    protected $fakeIdentificationBlock;

    /** @var Ubki\Data\Block\CreditsInformation */
    protected $fakeCreditsBlock;

    /** @var Ubki\Data\Block\CourtDecisionsInformation */
    protected $fakeCourtsDecisionBlock;

    /** @var Ubki\Data\Block\CreditsRequestsInformation */
    protected $fakeCreditRegistersBlock;

    /** @var Ubki\Data\Block\InsurancesInformation */
    protected $fakeInsurancesReports;

    /** @var Ubki\Data\Block\ContactsInformation */
    protected $fakeContactsInformation;

    protected function setUp(): void
    {
        $this->fakeFormer = new Ubki\Push\Export\Former(true);
        $this->fakeRequestDataBlock = new Ubki\Push\Export\Request\Data(
            Ubki\Push\Export\Request\Type::EXPORT(),
            Ubki\Dictionary\RequestReason::EXPORT(),
            Carbon::parse(static::DATE),
            static::ID,
            Ubki\Dictionary\RequestInitiator::PARTNER()
        );
        $this->fakeIdentificationBlock = new Ubki\Data\Block\Identification(
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
            )
        );
        $this->fakeCreditsBlock = new Ubki\Data\Block\CreditsInformation(
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
            ])
        );
        $this->fakeCourtsDecisionBlock = new Ubki\Data\Block\CourtDecisionsInformation(
            new Ubki\Data\Collection\CourtDecision([
                new Ubki\Data\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionary\CourtSubject::PLAINTIFF(),
                    Ubki\Dictionary\CourtDeal::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    null,
                    static::LEGAL_FACT,
                    null,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA
                )
            ])
        );
        $this->fakeCreditRegistersBlock = new Ubki\Data\Block\CreditsRequestsInformation(
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
        $this->fakeInsurancesReports = new Ubki\Data\Block\InsurancesInformation(
            new Ubki\Data\Collection\InsuranceDeal([
                new Ubki\Data\InsuranceDeal(
                    static::INN,
                    static::ID,
                    Carbon::parse(static::INFORMATION_DATE),
                    Carbon::parse(static::START_DATE),
                    Carbon::parse(static::END_DATE),
                    Ubki\Dictionary\InsuranceDeal::ACCIDENT(),
                    Ubki\Dictionary\DealStatus::CLOSE(),
                    new Ubki\Data\Collection\InsuranceEvent([
                        new Ubki\Data\InsuranceEvent(
                            Carbon::parse(static::REQUEST_DATE),
                            Ubki\Dictionary\InsuranceDecision::POSITIVE(),
                            Carbon::parse(static::DECISION_DATE)
                        )
                    ]),
                    Carbon::parse(static::ACTUAL_END_DATE)
                )
            ])
        );
        $this->fakeContactsInformation = new Ubki\Data\Block\ContactsInformation(
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
        );
    }

    public function testImitationRealExport(): void
    {
        $document = new Ubki\Push\Export\DataDocument(
            new Ubki\Data\Block\Identification(
                new Ubki\Data\Credential(
                    Ubki\Dictionary\Language::RUS(),
                    'Иван',
                    'Иванович',
                    'Иванов',
                    Carbon::parse('1998-03-12'),
                    new Ubki\Data\Collection\IdentifiedPerson([
                        new Ubki\Data\NaturalPerson(
                            Carbon::parse('2018-06-13'),
                            Ubki\Dictionary\Language::RUS(),
                            'Иван',
                            'Иванов',
                            Carbon::parse('1998-03-12'),
                            Ubki\Dictionary\Gender::MAN(),
                            '1234567890',
                            'Иванович'
                        ),
                        new Ubki\Data\NaturalPerson(
                            Carbon::parse('2018-06-13'),
                            Ubki\Dictionary\Language::RUS(),
                            'Иван',
                            'Иванов',
                            Carbon::parse('1998-03-12'),
                            Ubki\Dictionary\Gender::MAN(),
                            '1234567890',
                            'Иванович'
                        ),
                    ]),
                    new Ubki\Data\Collection\Document([
                        new Ubki\Data\Document(
                            Carbon::parse('2018-06-13'),
                            Ubki\Dictionary\Language::RUS(),
                            Ubki\Dictionary\Document::PASSPORT(),
                            'АА',
                            '123456',
                            'Харьковский ...',
                            Carbon::parse('2014-03-12')
                        )
                    ]),
                    new Ubki\Data\Collection\Address([
                        new Ubki\Data\Address(
                            Carbon::parse('2018-06-13'),
                            Ubki\Dictionary\Language::RUS(),
                            Ubki\Dictionary\Address::HOME(),
                            'Україна',
                            'Харьков',
                            'Научная',
                            '65',
                            null,
                            'Харьков',
                            null,
                            null,
                            null,
                            ''
                        )
                    ]),
                    '1234567890',
                    new Ubki\Data\Collection\Work([
                        new Ubki\Data\Work(
                            Carbon::make('2018-03-12'),
                            Ubki\Dictionary\Language::RUS(),
                            static::ERGPOU,
                            static::NAME,
                            Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                            10,
                            1234.56
                        )
                    ])
                )
            ),
            new Ubki\Data\Block\CreditsInformation(
                new Ubki\Data\Collection\CreditDeal([
                    new Ubki\Data\CreditDeal(
                        '123456',
                        Ubki\Dictionary\Language::RUS(),
                        'Иван',
                        'Иванов',
                        Carbon::parse('1998-03-12'),
                        Ubki\Dictionary\CreditDeal::OTHER_CONSUMER_PURPOSES(),
                        Ubki\Dictionary\Collateral::LEGAL(),
                        Ubki\Dictionary\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
                        Ubki\Dictionary\Currency::UAH(),
                        2500,
                        Ubki\Dictionary\SubjectRole::BORROWER(),
                        2500,
                        new Ubki\Data\Collection\DealLife([
                            new Ubki\Data\DealLife(
                                '123456',
                                1,
                                2018,
                                Carbon::parse('2018-03-12'),
                                Carbon::parse('2018-03-20'),
                                Ubki\Dictionary\DealStatus::CLOSE(),
                                0,
                                0,
                                0,
                                0,
                                0,
                                Ubki\Dictionary\Flag::NO(),
                                Ubki\Dictionary\Flag::NO(),
                                Ubki\Dictionary\Flag::NO(),
                                Carbon::parse('2018-03-13'),
                                Carbon::parse('2018-03-13')
                            )
                        ]),
                        '1234567890',
                        'Иванович'
                    )
                ])
            ),
            new Ubki\Data\Block\ContactsInformation(
                new Ubki\Data\Collection\Contact([
                    new Ubki\Data\Contact(
                        Carbon::parse('2017-05-11'),
                        '380930439474',
                        Ubki\Dictionary\Contact::MOBILE(),
                        '1234567890'
                    ),
                ])
            )
        );
        $request = new Ubki\Push\Export\Request($this->fakeRequestDataBlock, $document);

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="utf-8"?>
<doc>
    <ubki sessid="testSessionId">
        <req_envelope>
            <req_xml>
                <request version="1.0" reqtype="i" reqreason="0" reqdate="2018-03-12"
                         reqidout="testId" reqsource="1">
                    <ubkidata>
                        <comp id="1">
                            <cki inn="1234567890" lname="Иванов" fname="Иван" mname="Иванович" reqlng="1"
                                 bdate="1998-03-12">
                                <ident vdate="2018-06-13" inn="1234567890" lname="Иванов" fname="Иван"
                                       mname="Иванович" lng="1" bdate="1998-03-12" csex="1"/>
                                <ident vdate="2018-06-13" inn="1234567890" lname="Иванов" fname="Иван"
                                       mname="Иванович" lng="1" bdate="1998-03-12" csex="1"/>
                                <work wname="testName" wokpo="testErgpou" vdate="2018-03-12" wstag="10" wdohod="1234.56"
                                      lng="1" cdolgn="1"/>
                                <doc vdate="2018-06-13" lng="1" dtype="1" dser="АА" dnom="123456"
                                     dwho="Харьковский ..." dwdt="2014-03-12"/>
                                <addr vdate="2018-06-13" lng="1" adtype="1" adcountry="Україна" adstate="Харьков"
                                      adcity="Харьков" adstreet="Научная" adhome="65" adflat=""/>
                            </cki>
                        </comp>
                        <comp id="2">
                            <crdeal dlref="123456" inn="1234567890" fname="Иван" lname="Иванов"
                                    mname="Иванович" bdate="1998-03-12" dlcelcred="7" dlvidobes="1" dlporpog="7"
                                    dlcurr="980" dlamt="2500" dlrolesub="1" dlamtobes="2500" lng="1">
                                <deallife dlref="123456" dlmonth="1" dlyear="2018" dlds="2018-03-12" dldpf="2018-03-20"
                                          dldff="2018-03-13" dlflstat="2" dlamtlim="0" dlamtpaym="0" dlamtcur="0"
                                          dlamtexp="0" dldayexp="0" dlflpay="0" dlflbrk="0" dlfluse="0"
                                          dldateclc="2018-03-13"/>
                            </crdeal>
                        </comp>
                        <comp id="10">
                            <cont inn="1234567890" vdate="2017-05-11" ctype="3" cval="380930439474"/>
                        </comp>
                    </ubkidata>
                </request>
            </req_xml>
        </req_envelope>
    </ubki>
</doc>
',
            $this->fakeFormer->form($request, static::SESSION_ID)
        );
    }

    public function testStandardExportReport(): void
    {
        $document = new Ubki\Push\Export\DataDocument(
            $this->fakeIdentificationBlock,
            $this->fakeCreditsBlock,
            $this->fakeContactsInformation
        );

        $request = new Ubki\Push\Export\Request($this->fakeRequestDataBlock, $document);
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="utf-8"?>
<doc>
    <ubki sessid="testSessionId">
        <req_envelope>
            <req_xml>
                <request reqidout="testId" reqdate="2018-03-12" reqtype="i" reqreason="0" reqsource="1" version="1.0">
                    <ubkidata>
                    <comp id="1">
                        <cki reqlng="1" fname="testName" inn="testInn" mname="testPatronymic" lname="testSurname" 
                        bdate="1998-03-12">
                            <ident fname="testName" mname="testPatronymic" lname="testSurname" inn="testInn"
                                   bdate="1998-03-12" vdate="2018-03-12" cchild="2" lng="8" ceduc="2" family="1"
                                   csex="1" cgrag="643" spd="2" sstate="5"/>
                            <urident lng="1" vdate="2018-03-12" urname="testName" urdatregnal="2016-03-12"
                                     urdatreg="2017-03-12" ureconom="F" urvide="testActivityType"
                                     okpo="testErgpou" urfrms="610"/>
                            <linked okpo2_name="testName" okpo2="testErgpou" rdate="2018-03-14" linkrole="2"/>
                            <work wname="testName" wokpo="testErgpou" vdate="2018-03-12" wstag="10" wdohod="1234.56"
                                  lng="1" cdolgn="1"/>
                            <doc vdate="2018-03-12" lng="1" dtype="8" dwho="testIssue" dnom="testNumber" 
                            dser="testSerial"
                                 dwdt="2018-03-14" dterm="2020-01-01"/>
                            <addr lng="1" vdate="2018-03-12" adtype="2" adarea="testArea" adcity="testCity"
                                  adcitytype="2" adcorp="testCorpus" adcountry="testCountry" adflat="testFlat"
                                  addrdirt="testFullAddress" adhome="testHouse" adindex="testIndex" adstate="testState"
                                  adstreet="testStreet"/>
                            <foto vdate="2018-03-12" inn="testInn" foto="testPhoto"/>
                        </cki>
                    </comp>
                    <comp id="2">
                        <crdeal dlcelcred="9" lng="1" dlref="testId" bdate="1998-03-12" dlvidobes="1" dlamtobes="5000"
                                dlcurr="980" fname="testName" dlamt="5000" inn="testInn" lname="testSurname"
                                mname="testPatronymic" dlporpog="9" dldonor="testSource" dlrolesub="1">
                            <deallife dlref="testId" dlds="2018-03-14" dldff="2019-02-01" dlfluse="0" dlamtcur="2400.45"
                                      dlamtexp="2200" dlflbrk="1" dldpf="2019-03-12" dlamtlim="10000" dlamtpaym="2000"
                                      dldayexp="20" dldateclc="2018-03-12" dlflpay="1" dlmonth="4" dlyear="2012"
                                      dlflstat="2"/>
                        </crdeal>
                    </comp>
                    <comp id="10">
                        <cont ctype="4" inn="testInn" vdate="2018-03-12" cval="testValue"/>
                        <cont ctype="3" inn="testInn" vdate="2018-03-12" cval="testValue"/>
                    </comp>
                    </ubkidata>
                </request>
            </req_xml>
        </req_envelope>
    </ubki>
</doc>',
            $this->fakeFormer->form($request, static::SESSION_ID)
        );
    }

    public function testFullDataDocument(): void
    {
        $document = new Ubki\Push\Export\DataDocument(
            $this->fakeIdentificationBlock,
            $this->fakeCreditsBlock,
            $this->fakeContactsInformation,
            $this->fakeCourtsDecisionBlock,
            $this->fakeCreditRegistersBlock
        );
        $request = new Ubki\Push\Export\Request($this->fakeRequestDataBlock, $document);

        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="utf-8"?>
<doc>
    <ubki sessid="testSessionId">
        <req_envelope>
            <req_xml>
                <request reqidout="testId" reqdate="2018-03-12" reqtype="i" reqreason="0" reqsource="1" version="1.0">
                    <ubkidata>
                    <comp id="1">
                        <cki reqlng="1" fname="testName" inn="testInn" mname="testPatronymic" lname="testSurname" 
                        bdate="1998-03-12">
                            <ident fname="testName" mname="testPatronymic" lname="testSurname" inn="testInn"
                                   bdate="1998-03-12" vdate="2018-03-12" cchild="2" lng="8" ceduc="2" family="1"
                                   csex="1" cgrag="643" spd="2" sstate="5"/>
                            <urident lng="1" vdate="2018-03-12" urname="testName" urdatregnal="2016-03-12"
                                     urdatreg="2017-03-12" ureconom="F" urvide="testActivityType"
                                     okpo="testErgpou" urfrms="610"/>
                            <linked okpo2_name="testName" okpo2="testErgpou" rdate="2018-03-14" linkrole="2"/>
                            <work wname="testName" wokpo="testErgpou" vdate="2018-03-12" wstag="10" wdohod="1234.56"
                                  lng="1" cdolgn="1"/>
                            <doc vdate="2018-03-12" lng="1" dtype="8" dwho="testIssue" dnom="testNumber"
                             dser="testSerial"
                                 dwdt="2018-03-14" dterm="2020-01-01"/>
                            <addr lng="1" vdate="2018-03-12" adtype="2" adarea="testArea" adcity="testCity"
                                  adcitytype="2" adcorp="testCorpus" adcountry="testCountry" adflat="testFlat"
                                  addrdirt="testFullAddress" adhome="testHouse" adindex="testIndex" adstate="testState"
                                  adstreet="testStreet"/>
                            <foto vdate="2018-03-12" inn="testInn" foto="testPhoto"/>
                        </cki>
                    </comp>
                    <comp id="2">
                        <crdeal dlcelcred="9" lng="1" dlref="testId" bdate="1998-03-12" dlvidobes="1" dlamtobes="5000"
                                dlcurr="980" fname="testName" dlamt="5000" inn="testInn" lname="testSurname"
                                mname="testPatronymic" dlporpog="9" dldonor="testSource" dlrolesub="1">
                            <deallife dlref="testId" dlds="2018-03-14" dldff="2019-02-01" dlfluse="0" dlamtcur="2400.45"
                                      dlamtexp="2200" dlflbrk="1" dldpf="2019-03-12" dlamtlim="10000" dlamtpaym="2000"
                                      dldayexp="20" dldateclc="2018-03-12" dlflpay="1" dlmonth="4" dlyear="2012"
                                      dlflstat="2"/>
                        </crdeal>
                    </comp>
                    <comp id="3">
                        <susd voteid="testId" inn="testInn" votesudregion="testArea" vdate="2018-03-12" 
                              votesudname="testCourtName"
                              votetype="5" votedate="2018-03-12" votedoctype="testDocumentType"
                              voteurfact="testLegalFact" voteusrst="1"/>
                    </comp>
                    <comp id="4">
                        <credres redate="2018-03-12" inn="testInn" reqid="testId" result="1" org="testOrganization"
                                 reqreason="0"/>
                        <reestrtime hr="1" da="2" wk="3" mn="4" qw="5" ye="10" yu="200"/>
                    </comp>
                    <comp id="10">
                        <cont ctype="4" cval="testValue" inn="testInn" vdate="2018-03-12"/>
                        <cont ctype="3" cval="testValue" inn="testInn" vdate="2018-03-12"/>
                    </comp>
                    </ubkidata>
                </request>
            </req_xml>
        </req_envelope>
    </ubki>
</doc>',
            $this->fakeFormer->form($request, static::SESSION_ID)
        );
    }

    public function testException(): void
    {
        $this->expectException(Ubki\Exception\Former::class);

        $this->fakeFormer->form(
            new class extends Ubki\Element implements RequestInterface
            {
                public function getBody()
                {
                    return null;
                }

                public function getHead(): Ubki\Data\RequestHead
                {
                    throw new \RuntimeException();
                }
            },
            static::SESSION_ID
        );
    }

    protected function createNaturalPerson(): Ubki\Data\NaturalPerson
    {
        return new Ubki\Data\NaturalPerson(
            Carbon::make(static::CREATED_AT),
            Ubki\Dictionary\Language::RUS(),
            static::NAME,
            static::SURNAME,
            Carbon::make(static::BIRTH_DATE),
            Ubki\Dictionary\Gender::MAN(),
            static::INN,
            static::PATRONYMIC
        );
    }
}
