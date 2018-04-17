<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Carbon\Carbon;
use Gamez\Psr\Log\TestLogger;
use Wearesho\Bobra\Ubki;
use GuzzleHttp;
use PHPUnit\Framework\TestCase;

/**
 * Class ProviderTest
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class ProviderTest extends TestCase
{
    /** @var TestLogger */
    protected $logger;

    protected function setUp(): void
    {
        parent::setUp();
        $this->logger = new TestLogger();
    }


    public function testProvide()
    {
        $response = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc><auth sessid="TESTSESSIONID" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" userlogin="UserLogin" userid="1" userfname="FirstName" userlname="LastName" usermname="MiddleName" rolegroupid="2" rolegroupname="GroupName" agrid="3" agrname="OrganizationName" role="1"/></doc>'; // phpcs:ignore
        $container = [];
        $history = GuzzleHttp\Middleware::history($container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $response),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);

        $client = new GuzzleHttp\Client(['handler' => $stack,]);

        $provider = new Ubki\Authorization\Provider(
            new Ubki\Config('test-provider-username', 'test-provide-password'),
            $client,
            $this->logger
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $response = $provider->provide();

        // testing response
        $this->assertEquals(
            new Ubki\Authorization\Response(
                'TESTSESSIONID',
                Carbon::createFromFormat('d.m.Y G:i', '25.05.2017 15:20'),
                Carbon::createFromFormat('d.m.Y G:i', '26.05.2017 0:00'),
                'UserLogin',
                1,
                'LastName',
                'FirstName',
                'MiddleName',
                2,
                'GroupName',
                3,
                'OrganizationName'
            ),
            $response
        );


        // testing request
        $this->assertCount(1, $container);

        /** @var GuzzleHttp\Psr7\Request $request */
        $request = $container[0]['request'];
        $this->assertEquals(
            'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPGRvYz48YXV0aCBsb2dpbj0idGVzdC1wcm92aWRlci11c2VybmFtZSIgcGFzcz0idGVzdC1wcm92aWRlLXBhc3N3b3JkIi8+PC9kb2M+Cg==', // phpcs:ignore
            (string)$request->getBody()
        );
        $this->assertEquals(
            Ubki\ConfigInterface::TEST_AUTH_URL,
            (string)$request->getUri()
        );
        $this->assertEquals(
            'POST',
            $request->getMethod()
        );

        // testing logs
        $this->assertTrue($this->logger->log->hasRecordsWithMessage('UBKI Authorization Request'));
        $this->assertTrue($this->logger->log->hasRecordsWithMessage('UBKI Authorization Response'));
        $this->assertTrue($this->logger->log->hasRecordsWithContextKeyAndValue('sessid', 'TEST****ONID'));
        $this->assertFalse($this->logger->log->hasRecordsWithContextKeyAndValue('sessid', 'TESTSESSIONID'));
    }
}
