<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;

use chillerlan\SimpleCache;

use Gamez\Psr\Log\TestLogger;

use GuzzleHttp;

use Wearesho\Bobra\Ubki\Tests\TestCase;

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

    /** @var Ubki\Push\Registry\Service */
    protected $service;

    /** @var Carbon */
    protected $now;

    public function setUp(): void
    {
        parent::setUp();

        $this->now = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $date = Carbon::create($this->now->year, $this->now->month, $this->now->day, 0, 0, 0)->format('Ymd');
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
                <prot todo=\"REP\" indate=\"{$date}\" idout=\"IN#0000018427\" 
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
            Carbon::create($this->now->year, $this->now->month, $this->now->day, 0, 0, 0),
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        /** @var Ubki\RequestResponsePair $response */
        $response = $this->service->send($request);
        $parser = new Ubki\Push\Registry\Parser();

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertEquals(
            $parser->parseResponses($this->responseRegistryXml)->offsetGet(0),
            $parser->parseResponses($response->getResponse())->offsetGet(0)
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
            Carbon::create($this->now->year, $this->now->month, $this->now->day, 0, 0, 0),
            'IN#0000018427',
            'X000000000001'
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        /** @var Ubki\RequestResponsePair $response */
        $response = $this->service->send($request);
        $parser = new Ubki\Push\Registry\Parser();

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertEquals(
            $parser->parseResponses($this->responseRegistryXml)->offsetGet(0),
            $parser->parseResponses($response->getResponse())->offsetGet(0)
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

    public function testInvalidXmlContentProductionMode(): void
    {
        $this->expectException(\Exception::class);

        $responseRegistryXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc><prot></prot></doc>';

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
        /** @var Ubki\RequestResponsePair $response */
        $response = $this->service->send($request);
        $parser = new Ubki\Push\Registry\Parser();
        /** @noinspection PhpUnhandledExceptionInspection */
        $reportCollection = $parser->parseResponses($response->getResponse());

        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertEquals(
            $parser->parseResponses($responseRegistryXml),
            $reportCollection
        );

        /** @var Ubki\Push\Registry\Rep\Response $report */
        foreach ($reportCollection as $report) {
            $this->assertEquals(Ubki\Push\Registry\Response\State::PROCESSED(), $report->getState());
            $this->assertEquals(Ubki\Push\Registry\Type::REP, $report->getType());
            $this->assertEquals(Carbon::parse('20101010'), $report->getExportDate());
            $this->assertEquals('A1F593950A8F4562AE5A5DB1914D658A', $report->getSessionId());
            $this->assertEquals('NW', $report->getRegistryType());
            $this->assertEmpty($report->getErrorType());
            $this->assertEquals('2404005906', $report->getInn());
        }

        /** @var Ubki\Push\Registry\Rep\Response $firstReport */
        $firstReport = $reportCollection->offsetGet(0);
        $secondReport = $reportCollection->offsetGet(1);
        $thirdReport = $reportCollection->offsetGet(2);
        $fourthReport = $reportCollection->offsetGet(3);
        $fifthReport = $reportCollection->offsetGet(4);

        $this->assertEquals('ADDR', $firstReport->getItem());
        $this->assertEquals(1, $firstReport->getBlockId());
        $this->assertEquals(
            'OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010',
            $firstReport->getRemark()
        );

        $this->assertEquals('DOC', $secondReport->getItem());
        $this->assertEquals(1, $secondReport->getBlockId());
        $this->assertEquals(
            'OK. Язык: 1. Серия док.: МТ 333333 Харьковский Украины в Харьковской обл.. Тип документа: 1.',
            $secondReport->getRemark()
        );

        $this->assertEquals('IDENT', $thirdReport->getItem());
        $this->assertEquals(1, $thirdReport->getBlockId());
        $this->assertEquals(
            'OK. Язык: 1. ФИО: ИВАНОВ ИВАН ИВАНОВИЧ АЛЕКСАНДРОВИЧ. Дата версии: 10.10.2010',
            $thirdReport->getRemark()
        );

        $this->assertEquals('CRDEAL', $fourthReport->getItem());
        $this->assertEquals(2, $fourthReport->getBlockId());
        $this->assertEquals(
            'OK IN. Референс договора: 111111. Месяц среза: 1. Год среза: 2010',
            $fourthReport->getRemark()
        );

        $this->assertEquals('CONT', $fifthReport->getItem());
        $this->assertEquals(10, $fifthReport->getBlockId());
        $this->assertEquals(
            'OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009',
            $fifthReport->getRemark()
        );

        $this->assertNotEmpty($response->getRequest());
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

    public function testGetConfig(): void
    {
        $config = new Ubki\Push\EnvironmentConfig();
        $client = new GuzzleHttp\Client();
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

        $this->assertEquals($config, $this->service->config());
    }

    public function testNullResponse(): void
    {
        $this->expectException(GuzzleHttp\Exception\RequestException::class);

        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $this->responseAuth),
            new GuzzleHttp\Psr7\Response(200, [], $this->responseRegistryUrl),
            new GuzzleHttp\Exception\RequestException(
                'Some client error error',
                new GuzzleHttp\Psr7\Request('get', '')
            )
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
