<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Gamez\Psr\Log\TestLogger;
use Horat1us\Environment;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class EnvironmentConfigTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var Authorization\ConfigInterface */
    protected $config;

    /** @var TestLogger */
    protected $logger;

    protected $response;

    protected function setUp(): void
    {
        $this->logger = new TestLogger();
        $this->config =
            new class('UBKI_') extends Environment\Config implements Authorization\ConfigInterface
            {
                use Authorization\EnvironmentConfigTrait;
            };

        parent::setUp();
    }

    public function testGetEmptyUsername(): void
    {
        putenv('UBKI_USERNAME');
        $this->expectException(Environment\MissingEnvironmentException::class);
        $this->expectExceptionMessage('Missing environment key UBKI_USERNAME');

        $this->config->getUsername();
    }

    public function testGetUsername(): void
    {
        $username = 'username';
        putenv("UBKI_USERNAME={$username}");

        $this->assertEquals($username, $this->config->getUsername());
    }

    public function testGetEmptyPassword(): void
    {
        putenv('UBKI_PASSWORD');
        $this->expectException(Environment\MissingEnvironmentException::class);
        $this->expectExceptionMessage('Missing environment key UBKI_PASSWORD');
        $this->config->getPassword();
    }

    public function testGetPassword(): void
    {
        $password = 'password';
        putenv("UBKI_PASSWORD={$password}");

        $this->assertEquals($password, $this->config->getPassword());
    }

    public function testGetEmptyMode(): void
    {
        putenv('UBKI_PUSH_MODE');
        $this->expectException(Environment\MissingEnvironmentException::class);
        $this->expectExceptionMessage('Missing environment key UBKI_PUSH_MODE');
        $this->config->isProductionMode();
    }

    public function testGetProductionMode(): void
    {
        putenv('UBKI_PUSH_MODE=1');

        $this->assertEquals(true, $this->config->isProductionMode());
    }

    public function testGetTestMode(): void
    {
        putenv('UBKI_PUSH_MODE=0');

        $this->assertEquals(false, $this->config->isProductionMode());
    }

    public function testGetInvalidMode(): void
    {
        putenv('UBKI_PUSH_MODE=228');
        $this->expectException(Authorization\UnsupportedModeException::class);
        $this->expectExceptionMessage('Mode have invalid value 228');

        $this->assertEquals(false, $this->config->isProductionMode());
    }

    public function testGetTestEnvironmentAuthUrlFrom(): void
    {
        $mode = Authorization\ConfigInterface::MODE_TEST;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(Authorization\ConfigInterface::TEST_AUTH_URL);
        $this->assertEquals(Authorization\ConfigInterface::TEST_AUTH_URL, $this->config->getAuthUrl());
    }

    public function testGetProductionEnvironmentAuthUrl(): void
    {
        $mode = Authorization\ConfigInterface::MODE_PRODUCTION;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(Authorization\ConfigInterface::PRODUCTION_AUTH_URL);
        $this->assertEquals(Authorization\ConfigInterface::PRODUCTION_AUTH_URL, $this->config->getAuthUrl());
    }
}
