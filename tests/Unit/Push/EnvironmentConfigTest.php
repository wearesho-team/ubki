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
        putenv('TEST_PUSH_REGISTRY_URL=' . Ubki\Push\EnvironmentConfig::TEST_REGISTRY_URL);
        putenv('TEST_PUSH_URL=' . Ubki\Push\EnvironmentConfig::TEST_PUSH_URL);
        $this->configTestMode = new Ubki\Push\EnvironmentConfig('TEST_PUSH_');

        putenv('PRODUCTION_PUSH_MODE=' . Ubki\Push\EnvironmentConfig::MODE_PRODUCTION);
        putenv('PRODUCTION_PUSH_REGISTRY_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_REGISTRY_URL);
        putenv('PRODUCTION_PUSH_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_PUSH_URL);
        $this->configProductionMode = new Ubki\Push\EnvironmentConfig('PRODUCTION_PUSH_');
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
        $this->expectException(Ubki\Exception\UnsupportedMode::class);
        $this->expectExceptionMessage("Mode have invalid value 3");
        new Ubki\Push\Config('username', 'password', 3);
    }

    public function testGetDefaultUrls(): void
    {
        putenv('TEST_PREFIX_MODE=' . Ubki\Push\EnvironmentConfig::MODE_TEST);
        putenv('PRODUCTION_PREFIX_MODE=' . Ubki\Push\EnvironmentConfig::MODE_PRODUCTION);

        $config = new Ubki\Push\EnvironmentConfig('TEST_PREFIX_');
        $url = $config->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_REGISTRY_URL, $url);
        $url = $config->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_PUSH_URL, $url);

        $config = new Ubki\Push\EnvironmentConfig('PRODUCTION_PREFIX_');
        $url = $config->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_REGISTRY_URL, $url);
        $url = $config->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_PUSH_URL, $url);
    }

    public function testDefaultPrefix(): void
    {
        putenv('UBKI_PUSH_USERNAME=username');
        putenv('UBKI_PUSH_PASSWORD=password');
        putenv('UBKI_PUSH_MODE=' . Ubki\Push\EnvironmentConfig::MODE_PRODUCTION);
        putenv('UBKI_REGISTRY_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_REGISTRY_URL);
        putenv('UBKI_PUSH_URL=' . Ubki\Push\EnvironmentConfig::PRODUCTION_PUSH_URL);
        $environemntConfig = new Ubki\Push\EnvironmentConfig();

        $this->assertEquals(
            Ubki\Push\EnvironmentConfig::PRODUCTION_REGISTRY_URL,
            $environemntConfig->getRegistryUrl()
        );
        $this->assertEquals(
            Ubki\Push\EnvironmentConfig::PRODUCTION_PUSH_URL,
            $environemntConfig->getPushUrl()
        );
        $this->assertEquals('username', $environemntConfig->getUsername());
        $this->assertEquals('password', $environemntConfig->getPassword());
    }
}
