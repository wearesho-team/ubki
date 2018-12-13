<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Export;

use Carbon\Carbon;
use chillerlan\SimpleCache;
use Gamez\Psr\Log\TestLogger;
use GuzzleHttp;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ServiceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Export
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Export\Service
 * @internal
 */
class ServiceTest extends TestCase
{
    protected const USERNAME = 'testUsername';
    protected const PASSWORD = 'testPassword';
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

    /** @var Ubki\Push\Export\Service */
    protected $fakeService;

    /** @var  Ubki\Push\ConfigInterface */
    protected $config;

    /** @var  Ubki\Authorization\CacheProvider */
    protected $authProvider;

    /** @var GuzzleHttp\Client */
    protected $client;

    /** @var array */
    protected $container;

    /** @var TestLogger */
    protected $logger;

    /** @var  Ubki\Push\Export\Request */
    protected $exportRequest;

    /** @var string */
    protected $exportXml;

    protected function setUp(): void
    {
        putenv('UBKI_PUSH_USERNAME=' . static::USERNAME);
        putenv('UBKI_PUSH_PASSWORD=' . static::PASSWORD);
        putenv('UBKI_PUSH_MODE=' .  Ubki\Authorization\ConfigInterface::MODE_TEST);
        putenv('UBKI_AUTH_URL=' . Ubki\Authorization\ConfigInterface::TEST_AUTH_URL);
        $this->logger = new TestLogger();
        $this->config = new  Ubki\Push\EnvironmentConfig();
        $this->exportRequest = new  Ubki\Push\Export\Request(
            new  Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::EXPORT(),
                Ubki\Dictionaries\RequestReason::EXPORT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            new  Ubki\Push\Export\DataDocument(
                new  Ubki\Data\Blocks\Identification(
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
                ),
                new Ubki\Data\Blocks\CourtDecisionsInformation(
                    new Ubki\Data\Collections\CourtDecisions([
                        new Ubki\Data\Elements\CourtDecision(
                            static::ID,
                            static::INN,
                            Carbon::parse(static::DATE),
                            Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                            Ubki\Dictionaries\CourtDealType::ECONOMIC(),
                            static::COURT_NAME,
                            static::DOCUMENT_TYPE,
                            null,
                            static::LEGAL_FACT,
                            null,
                            Carbon::parse(static::CREATED_AT),
                            static::AREA,
                            null
                        )
                    ])
                ),
                new Ubki\Data\Blocks\CreditsRequestsInformation(
                    new Ubki\Data\Collections\CreditRequests([
                        new Ubki\Data\Elements\CreditRequest(
                            Carbon::parse(static::DATE),
                            static::INN,
                            static::ID,
                            Ubki\Dictionaries\Decision::POSITIVE(),
                            Ubki\Dictionaries\RequestReason::EXPORT(),
                            static::ORGANIZATION
                        )
                    ]),
                    new Ubki\Data\Elements\RegistryTimes(
                        static::BY_HOUR,
                        static::BY_DAY,
                        static::BY_WEEK,
                        static::BY_MONTH,
                        static::BY_QUARTER,
                        static::BY_YEAR,
                        static::BY_MORE_YEAR
                    )
                )
            )
        );
        $this->exportXml = '<?xml version="1.0" encoding="utf-8"?>
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
                                     urdatreg="2017-03-12" ureconom="testBranch" urvide="testActivityType"
                                     okpo="testErgpou" urfrms="1"/>
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
</doc>';
    }

    public function testSuccessExport(): void
    {
        $authResponse =
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <doc>
                <auth sessid="testSessionId" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" 
                      userlogin="testUsername" userid="1"
                      userfname="FirstName" userlname="LastName" usermname="MiddleName"
                      rolegroupid="2" rolegroupname="GroupName"
                      agrid="3" agrname="OrganizationName" role="1"/>
            </doc>';
        $exportResponse =
            '<?xml version="1.0" encoding="utf-8"?><doc>
            <tech>
                <trace>
                    <step name="INPROC" stm="1530780931.0051" ftm="1530780931.1068"/>
                    <step name="VALID" stm="1530780931.1068" ftm="1530780931.116"/>
                    <step name="INSERT" stm="1530780931.3003" ftm="1530780931.3004"/>
                </trace>
                <reqinfo reqid="IN#1231231233"/>
                <error errtype="" errtext=""/>
                <sentdatainfo reqid="IN#1231231233" state="ok">
                </sentdatainfo>
            </tech>
            </doc>';
        $this->container = [];
        $history = GuzzleHttp\Middleware::history($this->container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $authResponse),
            new GuzzleHttp\Psr7\Response(200, [], $exportResponse),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $this->config = new Ubki\Push\EnvironmentConfig();
        $this->authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->fakeService = new Ubki\Push\Export\Service(
            $this->config,
            $this->authProvider,
            $client
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $requestResponsePair = $this->fakeService->export($this->exportRequest);

        $this->assertEquals(
            new Ubki\Push\EnvironmentConfig(),
            $this->fakeService->config()
        );
        $this->assertXmlStringEqualsXmlString(
            $this->exportXml,
            $requestResponsePair->getRequest()
        );
        $this->assertXmlStringEqualsXmlString(
            $exportResponse,
            $requestResponsePair->getResponse()
        );
        $parser = new Ubki\Push\Export\Parser();
        $this->assertEquals(
            new Ubki\Push\Export\Response(
                'IN#1231231233',
                'ok',
                '',
                '',
                new Ubki\Push\Error\Collection()
            ),
            $parser->parseResponse($requestResponsePair->getResponse())
        );
    }

    public function testErrorExport(): void
    {
        $authResponse =
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <doc>
                <auth sessid="testSessionId" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" 
                      userlogin="testUsername" userid="1"
                      userfname="FirstName" userlname="LastName" usermname="MiddleName"
                      rolegroupid="2" rolegroupname="GroupName"
                      agrid="3" agrname="OrganizationName" role="1"/>
            </doc>';
        $exportResponse =
            '<?xml version="1.0" encoding="utf-8"?><doc>
<tech>
    <trace>
        <step name="INPROC" stm="1530780931.0051" ftm="1530780931.1068"/>
        <step name="VALID" stm="1530780931.1068" ftm="1530780931.116"/>
        <step name="INSERT" stm="1530780931.3003" ftm="1530780931.3004"/>
    </trace>
    <reqinfo reqid="IN#1231231233"/>
    <error errtype="" errtext=""/>
    <sentdatainfo reqid="IN#1231231233" state="er">
        <item compid="2" tag="DEALLIFE" attr="DLFLPAY" code="CRITICAL"
              msg="(`DEALLIFE`-Блок кредитных срезов)найден пустой атрибут(DLFLPAY-Признак исполн. платежа)"
              ok="" er=""/>
        <item compid="2" tag="DEALLIFE" attr="DLFLUSE" code="CRITICAL"
              msg="(DEALLIFE-Блок кредитных срезов)найден пустой атрибут(DLFLUSE-Признак наличия кредитного транша)"
              ok="2" er="3"/>
        <item compid="2" tag="CRDEAL" attr="INN" code="CRITICAL"
              msg="Ошибка, отсутствует блок (`DOC` - Блок документов) " ok="" er=""/>
        <item compid="1" tag="ADDR" attr="" code="CRITICAL" msg="Отсутствует блок адреса (тег (`ADDR` - Блок адресов) )"
              ok="4" er="5"/>
    </sentdatainfo>
</tech>
</doc>';
        $this->container = [];
        $history = GuzzleHttp\Middleware::history($this->container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $authResponse),
            new GuzzleHttp\Psr7\Response(200, [], $exportResponse),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $this->config = new Ubki\Push\EnvironmentConfig();
        $this->authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->fakeService = new Ubki\Push\Export\Service(
            $this->config,
            $this->authProvider,
            $client
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $requestResponsePair = $this->fakeService->export($this->exportRequest);

        $this->assertEquals(
            new Ubki\Push\EnvironmentConfig(),
            $this->fakeService->config()
        );
        $this->assertXmlStringEqualsXmlString(
            $this->exportXml,
            $requestResponsePair->getRequest()
        );
        $this->assertXmlStringEqualsXmlString(
            $exportResponse,
            $requestResponsePair->getResponse()
        );
        $parser = new Ubki\Push\Export\Parser();
        $this->assertEquals(new Ubki\Push\Export\Response(
            'IN#1231231233',
            'er',
            '',
            '',
            new Ubki\Push\Error\Collection([
                new Ubki\Push\Error\Entity(
                    2,
                    'DEALLIFE',
                    'DLFLPAY',
                    'CRITICAL',
                    '(`DEALLIFE`-Блок кредитных срезов)найден пустой атрибут(DLFLPAY-Признак исполн. платежа)',
                    0,
                    0
                ),
                new Ubki\Push\Error\Entity(
                    2,
                    'DEALLIFE',
                    'DLFLUSE',
                    'CRITICAL',
                    '(DEALLIFE-Блок кредитных срезов)найден пустой атрибут(DLFLUSE-Признак наличия кредитного транша)',
                    2,
                    3
                ),
                new Ubki\Push\Error\Entity(
                    2,
                    'CRDEAL',
                    'INN',
                    'CRITICAL',
                    'Ошибка, отсутствует блок (`DOC` - Блок документов) ',
                    0,
                    0
                ),
                new Ubki\Push\Error\Entity(
                    1,
                    'ADDR',
                    '',
                    'CRITICAL',
                    'Отсутствует блок адреса (тег (`ADDR` - Блок адресов) )',
                    4,
                    5
                ),
            ])
        ), $parser->parseResponse($requestResponsePair->getResponse()));
    }

    public function testRequestException(): void
    {
        $authResponse =
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <doc>
                <auth sessid="testSessionId" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" 
                      userlogin="testUsername" userid="1"
                      userfname="FirstName" userlname="LastName" usermname="MiddleName"
                      rolegroupid="2" rolegroupname="GroupName"
                      agrid="3" agrname="OrganizationName" role="1"/>
            </doc>';
        $this->container = [];
        $history = GuzzleHttp\Middleware::history($this->container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $authResponse),
            new GuzzleHttp\Exception\RequestException(
                'Some client error',
                new GuzzleHttp\Psr7\Request('post', '')
            ),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $this->config = new Ubki\Push\EnvironmentConfig();
        $this->authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->fakeService = new Ubki\Push\Export\Service(
            $this->config,
            $this->authProvider,
            $client
        );

        $this->expectException(Ubki\Push\Export\RequestException::class);
        $this->expectExceptionMessage("Some client error");

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->fakeService->export($this->exportRequest);
    }
}
