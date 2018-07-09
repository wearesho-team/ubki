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
        $this->config = new EnvironmentConfig();

        parent::setUp();
    }

    public function testGetEmptyUsername(): void
    {
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
        putenv('UBKI_USERNAME=username');
        putenv('UBKI_PASSWORD=password');
        $this->expectException(MissingEnvironmentException::class);
        $this->expectExceptionMessage('Missing environment key UBKI_REGISTRY_MODE');
        $this->config->isProductionMode();
    }

    public function testGetProductionMode(): void
    {
        putenv('UBKI_REGISTRY_MODE=1');
        putenv('UBKI_USERNAME=username');
        putenv('UBKI_PASSWORD=password');

        $this->assertEquals(true, $this->config->isProductionMode());
        $this->assertEquals(EnvironmentConfig::PRODUCTION_REESTR_URL, $this->config->getRegistryUrl());
        $this->assertEmpty($this->config->getPushUrl());
    }

    public function testGetTestMode(): void
    {
        putenv('UBKI_REGISTRY_MODE=0');
        putenv('UBKI_USERNAME=username');
        putenv('UBKI_PASSWORD=password');

        $this->assertEquals(false, $this->config->isProductionMode());
        $this->assertEquals(EnvironmentConfig::TEST_REESTR_URL, $this->config->getRegistryUrl());
        $this->assertEquals(EnvironmentConfig::TEST_PUSH_URL, $this->config->getPushUrl());
    }

    public function testGetInvalidMode(): void
    {
        putenv('UBKI_REGISTRY_MODE=228');
        putenv('UBKI_USERNAME=username');
        putenv('UBKI_PASSWORD=password');
        $this->expectException(UnsupportedModeException::class);
        $this->expectExceptionMessage('Mode have invalid value 228');

        $this->assertEquals(false, $this->config->isProductionMode());
    }
}
