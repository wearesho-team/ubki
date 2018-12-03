<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull;

use Carbon\Carbon;
use chillerlan\SimpleCache;
use Gamez\Psr\Log\TestLogger;
use GuzzleHttp;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ServiceTest
 * Data for tests taken from specification
 * @package Wearesho\Bobra\Ubki\Tests\Pull
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Pull\Service
 * @internal
 */
class ServiceTest extends TestCase
{
    protected const USERNAME = 'testUsername';
    protected const PASSWORD = 'testPassword';
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';
    protected const INN = 'testInn';
    protected const NAME = 'testName';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';

    /** @var Ubki\Pull\EnvironmentConfig */
    protected $fakeConfig;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $fakeAuthProvider;

    /** @var string */
    protected $responseAuth;

    /** @var TestLogger */
    protected $logger;

    /** @var Ubki\Pull\Service */
    protected $fakeService;

    protected function setUp(): void
    {
        putenv('UBKI_PULL_USERNAME=' . static::USERNAME);
        putenv('UBKI_PULL_PASSWORD=' . static::PASSWORD);
        putenv('UBKI_PULL_MODE=' . Ubki\Authorization\ConfigInterface::MODE_TEST);
        putenv('UBKI_AUTH_URL=' . Ubki\Authorization\ConfigInterface::TEST_AUTH_URL);
        $this->fakeConfig = new Ubki\Pull\EnvironmentConfig();
        $this->responseAuth = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <doc>
                <auth sessid="A1F593950A8F4562AE5A5DB1914D658A" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" 
                      userlogin="UserLogin" userid="1" userfname="FirstName" 
                      userlname="LastName" usermname="MiddleName" rolegroupid="2"
                      rolegroupname="GroupName" agrid="3" agrname="OrganizationName" role="1"/>
            </doc>';
        $this->logger = new TestLogger();
    }

    public function testSuccessImport(): void
    {
        $importResponse = '<?xml version="1.0" encoding="UTF-8"?>
<ubkidata>
    <tech>
        <trace>
            <step name="build report" stm="2018-08-28 10:01:39.726" ftm="2018-08-28 10:01:40.832"/>
        </trace>
        <reqinfo reqid="req2#000116589343"/>
    </tech>
    <comp id="1" descr="Ідентифікація Суб’єкта кредитної історії (СКІ)">
        <cki bdate="1988-09-13" reqlngref="Русский" reqlng="2" mname="АНДРЕЕВНА" fname="ЕКАТЕРИНА" lname="РАКАЕВА"
             inn="3239818020">
            <ident cchild="" sstateref="" sstate="" spdref="физическое лицо" spd="1" cgragref="Украина" cgrag="804"
                   ceducref="" ceduc="" familyref="" family="" csexref="женщина" csex="2" bdate="1988-09-13"
                   mname="АНДРЕЕВНА" fname="ЕКАТЕРИНА" lname="РАКАЕВА" inn="3239818020" lngref="Русский" lng="2"
                   vdate="2016-05-27"/>
            <ident cchild="" sstateref="" sstate="" spdref="физическое лицо" spd="1" cgragref="" cgrag="802" ceducref=""
                   ceduc="" familyref="" family="" csexref="женщина" csex="2" bdate="1988-09-13" mname="АНДРЕЕВНА"
                   fname="ЕКАТЕРИНА" lname="ТАРАН" inn="3239818020" lngref="Украинский" lng="1" vdate="2007-04-13"/>
            <work wdohod="0.00" wstag="0"
                  wname="УКРАЇНСЬКЕ БЮРО КРЕДИТНИХ ІСТОРІЙ ТОВАРИСТВО З ОБМЕЖЕНОЮ ВІДПОВІДАЛЬНІСТЮ" wokpo="33546706"
                  cdolgnref="Рабочий\специалист\исполнитель" cdolgn="3" lngref="Украинский" lng="1" vdate="2014-12-20"/>
            <doc dwdt="2005-02-03" dwho="НИКОПОЛЬСКИМ ГО УМВД УКР. В ДНЕПРОПЕТРОВСКОЙ ОБЛ." dterm="" dnom="324004"
                 dser="АН" dtyperef="Паспорт" dtype="1" lngref="Украинский" lng="1" vdate="2010-02-01"/>
            <addr adflat="5" adcorp="" adhome="2" adstreet="БАРНАУЛЬСКАЯ" adcitytyperef="" adcitytype=""
                  adcity="НИКОПОЛЬ" adarea="" adstate="" adindex="" adcountry="UA" adtyperef="Адрес регистрации"
                  adtype="2" lngref="Украинский" lng="1" vdate="1900-01-01"/>
        </cki>
    </comp>
    <comp id="2" descr="Фінансові зобов`язання СКІ">
        <crdeal dlamtobes="" dlrolesubref="Заемщик" dlrolesub="1"
                dldonor="ПриватБанк|http://privatbank.ua/|0800500003|Дніпропетровська обл. ,  м.Дніпропетровськ ВУЛ. "
                dlamt="0.00" dlcurrref="Украинская гривня" dlcurr="980"
                dlporpogref="Карточный продукт с возобновляемой кредитной линией" dlporpog="3" dlvidobesref=""
                dlvidobes="" dlcelcredref="Кредитна картка" dlcelcred="31" bdate="1988-09-13" mname="АНДРЕЕВНА"
                fname="ЕКАТЕРИНА" lname="РАКАЕВА" inn="3239818020" lngref="Русский" lng="2" dlref="SAMDN40000011997130">
            <deallife dldateclc="2007-03-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="3" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-04-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="4" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-05-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="5" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-06-29" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="6" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-07-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="7" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-08-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="8" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-09-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="9" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-10-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="10" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-11-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="11" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2007-12-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2007"
                      dlmonth="12" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-01-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="1" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-02-29" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="2" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-03-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="3" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-04-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="4" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-05-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="5" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-06-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="6" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-07-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2012-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="7" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-09-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="9" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-10-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="10" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-11-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="11" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2008-12-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2008"
                      dlmonth="12" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-01-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="1" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-02-28" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="2" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-03-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="3" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-04-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="4" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-05-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="5" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-06-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="6" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-07-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="7" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-08-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="8" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-09-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="9" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-10-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="10" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-11-30" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="11" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2009-12-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2009"
                      dlmonth="12" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2010-01-31" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="500.00"
                      dlflstatref="открыта" dlflstat="1" dldff="" dldpf="2106-03-03" dlds="2007-03-03" dlyear="2010"
                      dlmonth="1" dlref="SAMDN40000011997130"/>
            <deallife dldateclc="2010-02-28" dlfluseref="Нет" dlfluse="0" dlflbrkref="Нет" dlflbrk="0" dlflpayref="Нет"
                      dlflpay="0" dldayexp="0" dlamtexp="0.00" dlamtcur="0.00" dlamtpaym="0.00" dlamtlim="0.00"
                      dlflstatref="закрыта" dlflstat="2" dldff="2010-02-10" dldpf="2106-03-03" dlds="2007-03-03"
                      dlyear="2010" dlmonth="2" dlref="SAMDN40000011997130"/>
        </crdeal>
    </comp>
    <comp id="3" descr="Судові рішення"/>
    <comp id="4" descr="Реєстр запитів">
        <credres org="BNK" reqreasonref="Заявка на кредит" reqreason="2" resultref="" result=""
                 reqid="req2#000074979221" inn="3239818020" redate="2018-02-06" retime="17:04:25" orgname="ІДЕЯ БАНК"/>
        <credres org="BNK" reqreasonref="Заявка на кредит" reqreason="2" resultref="" result=""
                 reqid="req2#000070533410" inn="3239818020" redate="2018-01-06" retime="16:49:39" orgname="ПриватБанк"/>
        <credres org="BNK" reqreasonref="Мониторинг клиента организации" reqreason="1" resultref="" result=""
                 reqid="req2#000010699856" inn="3239818020" redate="2016-07-12" retime="16:52:08" orgname="ІДЕЯ БАНК"/>
        <reestrtime hr="0" da="0" wk="0" mn="0" qw="0" ye="2" yu="1"/>
    </comp>
    <comp id="5" descr="Пошук паспорту у зовнішніх сервісах">
        <mvd found="0" foundref="Не знайдений" foundtitle="Паспорт АН-994832 не знайдений в списку загублених."
             pser="АН" pnom="994832" plname="Ракаєва" pfname="Катерина" pmname="Андріївна" pbdate="1988-09-13"/>
    </comp>
    <comp id="10" descr="Контакти">
        <cont cval="+380566694351" ctyperef="рабочий тел." ctype="2" vdate="2018-04-24"/>
        <cont cval="KNAVKA@BIGMIR.NET" ctyperef="эл. почта" ctype="4" vdate="2010-02-08"/>
    </comp>
    <comp id="17" descr="">
        <wantedmvs found="0" foundref="Не найден" bdate="1988-09-13" lng="2" lngref="Русский" lname="РАКАЕВА"
                   fname="ЕКАТЕРИНА" mname="АНДРЕЕВНА" url="" category="" articlecrim="" restraint=""/>
    </comp>
    <comp id="18" descr="Претензійна робота">
        <pret inn="3239818020" nonewdeal="0" nonewdealref="Нет" nonewdealcomment=""/>
    </comp>
</ubkidata>';
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $importResponse)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $this->fakeAuthProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->fakeService = new Ubki\Pull\Service(
            $this->fakeConfig,
            $this->fakeAuthProvider,
            $client,
            $this->logger
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $requestResponsePair = $this->fakeService->send(new Ubki\Pull\Request(
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::CREDIT_REPORT(),
                Ubki\Dictionaries\RequestReason::CREDIT_ONLINE(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            new Pull\Elements\RequestContent(
                References\Language::RUS(),
                new Pull\Elements\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Pull\Collections\Contacts([
                    new Pull\Elements\Contact(
                        References\ContactType::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Pull\Collections\Documents([
                    new Pull\Elements\Document(
                        References\DocumentType::PASSPORT(),
                        static::SERIAL,
                        static::NUMBER
                    ),
                ])
            )
        ));

        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="utf-8"?>
<doc><ubki sessid="A1F593950A8F4562AE5A5DB1914D658A"><req_envelope><req_xml>PHJlcXVlc3QgcmVxdHlwZT0iMDkiIHJlcXJlYXNvbj0iNCIgcmVxZGF0ZT0iMjAxOC0wMy0xMiI+CiAgPGkgcmVxbG5nPSIxIj4KICAgIDxpZGVudCBva3BvPSJ0ZXN0SW5uIiBmbmFtZT0idGVzdE5hbWUiIG1uYW1lPSJ0ZXN0UGF0cm9ueW1pYyIgbG5hbWU9InRlc3RTdXJuYW1lIiBiZGF0ZT0iMjAxOC0wMy0xMiIvPgogICAgPGNvbnRhY3RzPgogICAgICA8Y29udCBjdHlwZT0iMyIgY3ZhbD0idGVzdFZhbHVlIi8+CiAgICA8L2NvbnRhY3RzPgogICAgPGRvY3M+CiAgICAgIDxkb2MgZHR5cGU9IjEiIGRzZXI9InRlc3RTZXJpYWwiIGRub209InRlc3ROdW1iZXIiLz4KICAgIDwvZG9jcz4KICAgIDxtdmQvPgogICAgPGJwaG9uZSBwaG9uZT0iIi8+CiAgPC9pPgo8L3JlcXVlc3Q+</req_xml></req_envelope></ubki></doc>', // phpcs:ignore
            $requestResponsePair->getRequest()
        );
        $this->assertEquals(
            $importResponse,
            $requestResponsePair->getResponse()
        );
    }
}
