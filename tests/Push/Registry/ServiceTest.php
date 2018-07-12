<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;

use chillerlan\SimpleCache;

use Gamez\Psr\Log\TestLogger;

use GuzzleHttp;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class ServiceTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class ServiceTest extends TestCase
{
    /** @var string */
    protected $responseAuth;

    /** @var string */
    protected $responseRegistryUrl;

    /** @var string */
    protected $responseRegistryXml;

    /** @var TestLogger */
    protected $logger;

    /** @var Ubki\Push\Registry\ServiceInterface */
    protected $service;

    /** @var Carbon */
    protected $now;

    public function setUp(): void
    {
        parent::setUp();

        $this->now = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $this->logger = new TestLogger();
        $this->responseAuth = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <doc>
                <auth sessid="A1F593950A8F4562AE5A5DB1914D658A" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" 
                      userlogin="UserLogin" userid="1" userfname="FirstName" 
                      userlname="LastName" usermname="MiddleName" rolegroupid="2"
                      rolegroupname="GroupName" agrid="3" agrname="OrganizationName" role="1"/>
            </doc>';
        $this->responseRegistryXml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
            <doc>
                <prot todo=\"REP\" indate=\"{$this->now->format('Ymd')}\" idout=\"IN#0000018427\" 
                      idalien=\"X000000000001\"
                      sessid=\"A1F593950A8F4562AE5A5DB1914D658A\" state=\"r\" 
                      oper=\"i\" compid=\"1\" item=\"IDENT\" ertype=\"NW\" crytical=\"\"
                      inn=\"2404005906\" 
                      remark=\"OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014\"/>
            </doc>";
        $this->responseRegistryUrl = 'https://secure.ubki.ua/prot/files/9E24730AF30A415BAFBC435A90C53CC014740140584447';
    }

    public function testSendTestRegistry()
    {
        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'test-provider-username',
            'test-provide-password',
            Ubki\Push\Config::MODE_TEST
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $response = $this->service->send($request);

        $this->assertEquals(
            new Ubki\Push\Registry\ResponseCollection(
                array(
                    new Ubki\Push\Registry\Rep\Response(
                        $this->now,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        1,
                        'IDENT',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014'
                    )
                )
            ),
            $response
        );
    }

    public function testSendProductionRegistry(): void
    {
        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $response = $this->service->send($request);

        $this->assertEquals(
            new Ubki\Push\Registry\ResponseCollection(
                array(
                    new Ubki\Push\Registry\Rep\Response(
                        $this->now,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        1,
                        'IDENT',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014'
                    )
                )
            ),
            $response
        );
    }

    public function testInvalidXmlTestMode(): void
    {
        $this->expectException(GuzzleHttp\Exception\RequestException::class);

        $responseRegistry = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc></doc>';

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(400, [], $responseRegistry),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_TEST
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->service->send($request);
    }

    public function testInvalidXmlProductionMode(): void
    {
        $this->expectException(GuzzleHttp\Exception\RequestException::class);

        $responseRegistryXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc></doc>';

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(400, [], $responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->service->send($request);
    }

    public function testInvalidXmlContentProductionMode(): void
    {
        $this->expectException(\Exception::class);

        $responseRegistryXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc><prot /></doc>';

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(400, [], $responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->service->send($request);
    }

    public function testInvalidResponse(): void
    {
        $this->expectException(Ubki\Push\Registry\UnsupportedRequestException::class);

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'test-provider-username',
            'test-provide-password',
            Ubki\Push\Config::MODE_TEST
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $now = $this->now;

        $request =
            new class(
                'InvalidType',
                $now,
                'IN#0000018427',
                'X000000000001'
            ) implements Ubki\Push\Registry\RequestInterface
            {
                use Ubki\Push\Registry\RequestTrait;

                public function __construct(
                    string $todo,
                    \DateTimeInterface $operationDate,
                    string $ubkiId,
                    string $partnerId
                ) {
                    $this->todo = $todo;
                    $this->indate = $operationDate;
                    $this->idout = $ubkiId;
                    $this->idalien = $partnerId;
                }
            };

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->service->send($request);
    }

    public function testBodyRepXml(): void
    {
        $registryXmlBody = simplexml_load_string(
            "<?xml version=\"1.0\" encoding=\"utf-8\"?>
            <doc>
                <prot todo=\"REP\" indate=\"{$this->now->format('Ymd')}\"
                      sessid=\"A1F593950A8F4562AE5A5DB1914D658A\"
                      idout=\"IN#0000018427\" idalien=\"X000000000001\"/>
            </doc>"
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'test-provider-username',
            'test-provide-password',
            Ubki\Push\Config::MODE_TEST
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );

        $service =
            new class(
                $config,
                $authProvider,
                $client,
                $this->logger
            ) extends Ubki\Push\Registry\Service
            {
                public function runConvert(Ubki\Push\Registry\Rep\Request $request): GuzzleHttp\Psr7\Request
                {
                    return $this->convertToGuzzleRequest($request);
                }
            };

        /** @var GuzzleHttp\Psr7\Request $guzzleRequest */
        $guzzleRequest = $service->runConvert($request);
        $guzzleXmlBody = simplexml_load_string(base64_decode($guzzleRequest->getBody()->__toString()));

        $this->assertEquals($registryXmlBody, $guzzleXmlBody);
    }

    public function testRealRequestSimulation(): void
    {
        $responseRegistryXml =
            '<?xml version="1.0" encoding="utf-8"?>
<doc>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A"
          state="r" oper="i" compid="1" item="ADDR"
          ertype="NW" crytical=""
          inn="2404005906"
          remark="OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010"/>
    <prot todo="REP" indate="20101010"
          idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A"
          state="r" oper="i" compid="1" item="DOC" ertype="NW" crytical=""
          inn="2404005906"
          remark="OK. Язык: 1. Серия док.: МТ 333333 Харьковский Украины в Харьковской обл.. Тип документа: 1."/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="1" item="IDENT" ertype="NW" crytical=""
          inn="2404005906" remark="OK. Язык: 1. ФИО: ИВАНОВ ИВАН ИВАНОВИЧ АЛЕКСАНДРОВИЧ. Дата версии: 10.10.2010"/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="2" item="CRDEAL" ertype="NW" crytical=""
          inn="2404005906" remark="OK IN. Референс договора: 111111. Месяц среза: 1. Год среза: 2010"/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="10" item="CONT" ertype="NW" crytical=""
          inn="2404005906" remark="OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009"/>
</doc>';

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Psr7\Response(200, [], $responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $responses = $this->service->send($request);
        $time = Carbon::createFromFormat('Ymd', '20101010');

        $this->assertEquals(
            new Ubki\Push\Registry\ResponseCollection(
                array(
                    new Ubki\Push\Registry\Rep\Response(
                        $time,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        1,
                        'ADDR',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010'
                    ),
                    new Ubki\Push\Registry\Rep\Response(
                        $time,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        1,
                        'DOC',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Язык: 1. Серия док.: МТ 333333 Харьковский Украины в Харьковской обл.. Тип документа: 1.'
                    ),
                    new Ubki\Push\Registry\Rep\Response(
                        $time,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        1,
                        'IDENT',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Язык: 1. ФИО: ИВАНОВ ИВАН ИВАНОВИЧ АЛЕКСАНДРОВИЧ. Дата версии: 10.10.2010'
                    ),
                    new Ubki\Push\Registry\Rep\Response(
                        $time,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        2,
                        'CRDEAL',
                        'NW',
                        '',
                        '2404005906',
                        'OK IN. Референс договора: 111111. Месяц среза: 1. Год среза: 2010'
                    ),
                    new Ubki\Push\Registry\Rep\Response(
                        $time,
                        'IN#0000018427',
                        'X000000000001',
                        'A1F593950A8F4562AE5A5DB1914D658A',
                        Ubki\Push\Registry\Response\State::PROCESSED,
                        Ubki\Push\Registry\Response\OperationType::TRANSFERRING,
                        10,
                        'CONT',
                        'NW',
                        '',
                        '2404005906',
                        'OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009'
                    ),
                )
            ),
            $responses
        );
    }

    public function testInvalidUrl(): void
    {
        $this->expectException(Ubki\Push\Registry\RequestException::class);

        $responseRegistryXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc>Here is some error</doc>';

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $responseRegistryXml)
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new GuzzleHttp\Client(['handler' => $stack,]);
        $config = new Ubki\Push\Config(
            'production-provider-username',
            'production-provide-password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
        $authProvider = new Ubki\Authorization\CacheProvider(
            new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver()),
            $client,
            $this->logger
        );
        $this->service = new Ubki\Push\Registry\Service(
            $config,
            $authProvider,
            $client,
            $this->logger
        );

        $request = new Ubki\Push\Registry\Rep\Request(
            $this->now,
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->service->send($request);
    }
}
