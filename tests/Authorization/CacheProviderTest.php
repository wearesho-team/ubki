<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use chillerlan\SimpleCache;
use Gamez\Psr\Log\TestLogger;
use Horat1us\Environment;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;
use GuzzleHttp;

/**
 * Class CacheProviderTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class CacheProviderTest extends TestCase
{
    /** @var GuzzleHttp\Client */
    protected $client;

    /** @var TestLogger */
    protected $logger;

    /** @var Ubki\Authorization\ConfigInterface */
    protected $config;

    protected $environmentConfig;

    /** @var array */
    protected $container;

    protected function setUp(): void
    {
        parent::setUp();
        $response = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc><auth sessid="TESTSESSIONID" datecr="25.05.2017 15:20" dateed="26.05.2017 0:00" userlogin="UserLogin" userid="1" userfname="FirstName" userlname="LastName" usermname="MiddleName" rolegroupid="2" rolegroupname="GroupName" agrid="3" agrname="OrganizationName" role="1"/></doc>'; // phpcs:ignore
        $this->container = [];
        $history = GuzzleHttp\Middleware::history($this->container);
        $mock = new GuzzleHttp\Handler\MockHandler([
            new GuzzleHttp\Psr7\Response(200, [], $response),
        ]);
        $stack = GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);

        $this->client = new GuzzleHttp\Client(['handler' => $stack,]);
        $this->logger = new TestLogger();
        $this->config =
            new class(
                'username',
                'password'
            ) implements Ubki\Authorization\ConfigInterface
            {
                use Ubki\Authorization\ConfigTrait;

                public function __construct(string $username, string $password)
                {
                    $this->username = $username;
                    $this->password = $password;
                }

                public function isProductionMode(): bool
                {
                    return false;
                }
            };
        $this->environmentConfig =
            new class('UBKI_') extends Environment\Config implements Ubki\Authorization\ConfigInterface
            {
                use Ubki\Authorization\EnvironmentConfigTrait;
            };
    }

    public function testProvide(): void
    {
        $cache = new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver());
        $provider = new Ubki\Authorization\CacheProvider(
            $cache,
            $this->client,
            $this->logger
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $response = $provider->provide($this->config);
        /** @noinspection PhpUnhandledExceptionInspection */
        $duplicatedResponse = $provider->provide($this->config);

        $this->assertTrue(
            $response === $duplicatedResponse,
            'Second Response have to be pulled from cache'
        );

        $this->assertCount(1, $this->container, 'One HTTP request should be done');
        $this->assertFalse($this->logger->log->hasRecordsWithMessage(
            "UBKI Authorization Cache Failed for key ubki.authorization.80900aeb4b6d97eeed3ee5afe434f2ddc7aa8435"
        ));
    }

    public function testWriteLogFailed(): void
    {
        $cache = new SimpleCache\Cache(new class extends SimpleCache\Drivers\MemoryCacheDriver
        {
            public function set(string $key, $value, int $ttl = null): bool
            {
                return false;
            }
        });

        $provider = new Ubki\Authorization\CacheProvider(
            $cache,
            $this->client,
            $this->logger
        );

        /** @noinspection PhpUnhandledExceptionInspection */
        $provider->provide($this->config);

        $this->assertTrue($this->logger->log->hasRecordsWithMessage(
            "UBKI Authorization Cache Failed for key ubki.authorization.80900aeb4b6d97eeed3ee5afe434f2ddc7aa8435"
        ));
    }
}
