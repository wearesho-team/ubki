<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Gamez\Psr\Log\TestLogger;
use Horat1us\Environment\MissingEnvironmentException;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Authorization\UnsupportedModeException;

/**
 * Class EnvironmentConfigTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var EnvironmentConfig */
    protected $config;

    /** @var TestLogger */
    protected $logger;

    protected $response;

    protected function setUp(): void
    {
        $this->logger = new TestLogger();
        $this->config = new EnvironmentConfig('UBKI_');

        parent::setUp();
    }

    public function testGetEmptyUsername(): void
    {
        putenv('UBKI_USERNAME');
        $this->expectException(MissingEnvironmentException::class);
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
        $this->expectException(MissingEnvironmentException::class);
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
        $this->expectException(MissingEnvironmentException::class);
        $this->expectExceptionMessage('Missing environment key UBKI_PUSH_MODE');
        $this->config->isProductionMode();
    }

    public function testGetProductionMode(): void
    {
        putenv('UBKI_PUSH_MODE=1');

        $this->assertEquals(true, $this->config->isProductionMode());
        $this->assertEquals(EnvironmentConfig::PRODUCTION_REESTR_URL, $this->config->getRegistryUrl());
        $this->assertEquals(EnvironmentConfig::PRODUCTION_PUSH_URL, $this->config->getPushUrl());
    }

    public function testGetTestMode(): void
    {
        putenv('UBKI_PUSH_MODE=0');

        $this->assertEquals(false, $this->config->isProductionMode());
        $this->assertEquals(EnvironmentConfig::TEST_REESTR_URL, $this->config->getRegistryUrl());
        $this->assertEquals(EnvironmentConfig::TEST_PUSH_URL, $this->config->getPushUrl());
    }

    public function testGetInvalidMode(): void
    {
        putenv('UBKI_PUSH_MODE=228');
        $this->expectException(UnsupportedModeException::class);
        $this->expectExceptionMessage('Mode have invalid value 228');

        $this->assertEquals(false, $this->config->isProductionMode());
    }

    public function testGetTestEnvironmentPushUrl(): void
    {
        $mode = EnvironmentConfig::MODE_TEST;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(EnvironmentConfig::TEST_PUSH_URL);
        $this->assertEquals(EnvironmentConfig::TEST_PUSH_URL, $this->config->getPushUrl());
    }

    public function testGetProductionEnvironmentPushUrl(): void
    {
        $mode = EnvironmentConfig::MODE_PRODUCTION;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(EnvironmentConfig::PRODUCTION_PUSH_URL);
        $this->assertEquals(EnvironmentConfig::PRODUCTION_PUSH_URL, $this->config->getPushUrl());
    }

    public function testGetTestEnvironmentAuthUrlFrom(): void
    {
        $mode = EnvironmentConfig::MODE_TEST;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(EnvironmentConfig::TEST_AUTH_URL);
        $this->assertEquals(EnvironmentConfig::TEST_AUTH_URL, $this->config->getAuthUrl());
    }

    public function testGetProductionEnvironmentAuthUrl(): void
    {
        $mode = EnvironmentConfig::MODE_PRODUCTION;
        putenv("UBKI_PUSH_MODE={$mode}");
        putenv(EnvironmentConfig::PRODUCTION_AUTH_URL);
        $this->assertEquals(EnvironmentConfig::PRODUCTION_AUTH_URL, $this->config->getAuthUrl());
    }
}
