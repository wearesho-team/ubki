<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Authorization;

use Gamez\Psr\Log\TestLogger;
use Horat1us\Environment;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class EnvironmentConfigTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Authorization
 * @internal
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var Ubki\Authorization\ConfigInterface */
    protected $config;

    /** @var TestLogger */
    protected $logger;

    protected function setUp(): void
    {
        $this->logger = new TestLogger();
        $this->config =
            new class('UBKI_') extends Environment\Config implements Ubki\Authorization\ConfigInterface
            {
                use Ubki\Authorization\EnvironmentConfigTrait;
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

    public function testGetInvalidMode(): void
    {
        putenv('UBKI_MODE=228');
        putenv('UBKI_AUTH_URL');
        $this->expectException(Ubki\UnsupportedModeException::class);
        $this->expectExceptionMessage('Mode have invalid value 228');
        $this->assertEquals(false, $this->config->getAuthUrl());
    }

    public function testGetTestDefaultAuthUrl(): void
    {
        putenv('UBKI_MODE=' . Ubki\Authorization\ConfigInterface::MODE_TEST);
        putenv('UBKI_AUTH_URL');
        $this->assertEquals(Ubki\Authorization\ConfigInterface::TEST_AUTH_URL, $this->config->getAuthUrl());
    }

    public function testGetProductionDefaulttAuthUrl(): void
    {
        putenv('UBKI_MODE=' . Ubki\Authorization\ConfigInterface::MODE_PRODUCTION);
        putenv('UBKI_AUTH_URL');
        $this->assertEquals(Ubki\Authorization\ConfigInterface::PRODUCTION_AUTH_URL, $this->config->getAuthUrl());
    }

    public function testGetTestEnvironmentAuthUrl(): void
    {
        putenv('UBKI_AUTH_URL=' . Ubki\Authorization\ConfigInterface::TEST_AUTH_URL);
        $url = getenv('UBKI_AUTH_URL');
        $this->assertEquals(Ubki\Authorization\ConfigInterface::TEST_AUTH_URL, $url);
    }

    public function testGetProductionEnvironmentAuthUrl(): void
    {
        putenv('UBKI_AUTH_URL=' . Ubki\Authorization\ConfigInterface::PRODUCTION_AUTH_URL);
        $url = getenv('UBKI_AUTH_URL');
        $this->assertEquals(Ubki\Authorization\ConfigInterface::PRODUCTION_AUTH_URL, $url);
    }
}
