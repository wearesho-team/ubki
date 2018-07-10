<?php

namespace Wearesho\Bobra\Ubki\Tests\Push;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class ConfigTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push
 */
class ConfigTest extends TestCase
{
    /** @var Ubki\Push\ConfigInterface */
    protected $configTestMode;

    /** @var Ubki\Push\ConfigInterface */
    protected $configProductionMode;

    public function setUp(): void
    {
        parent::setUp();

        $this->configTestMode = new Ubki\Push\Config(
            'username',
            'password',
            Ubki\Push\ConfigInterface::MODE_TEST
        );
        $this->configProductionMode = new Ubki\Push\Config(
            'username',
            'password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
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
