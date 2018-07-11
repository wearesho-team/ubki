<?php

namespace Wearesho\Bobra\Ubki\Tests\Push;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class EnvironmentConfigTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var Ubki\Push\ConfigInterface */
    protected $configTestMode;

    /** @var Ubki\Push\ConfigInterface */
    protected $configProductionMode;

    public function setUp(): void
    {
        parent::setUp();

        putenv('TEST_PUSH_MODE=' . Ubki\Push\EnvironmentConfig::MODE_TEST);
        putenv('TEST_REGISTRY_URL=' . Ubki\Push\EnvironmentConfig::TEST_REGISTRY_URL);
        putenv('TEST_PUSH_URL=' . Ubki\Push\EnvironmentConfig::TEST_PUSH_URL);
        $this->configTestMode = new Ubki\Push\EnvironmentConfig('TEST_');

        putenv('PRODUCTION_PUSH_MODE=' . Ubki\Push\EnvironmentConfig::MODE_PRODUCTION);
        putenv('PRODUCTION_REGISTRY_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_REGISTRY_URL);
        putenv('PRODUCTION_PUSH_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_PUSH_URL);
        $this->configProductionMode = new Ubki\Push\EnvironmentConfig('PRODUCTION_');
    }

    public function testGetTestRegistryUrl(): void
    {
        $url = $this->configTestMode->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_REGISTRY_URL, $url);
    }

    public function testGetTestPushUrl(): void
    {
        $url = $this->configTestMode->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_PUSH_URL, $url);
    }

    public function testGetProductionRegistryUrl(): void
    {
        $url = $this->configProductionMode->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_REGISTRY_URL, $url);
    }

    public function testGetProductionPushUrl(): void
    {
        $url = $this->configProductionMode->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_PUSH_URL, $url);
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\UnsupportedModeException::class);
        $this->expectExceptionMessage("Mode have invalid value 3");
        new Ubki\Push\Config('username', 'password', 3);
    }
}