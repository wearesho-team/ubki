<?php

namespace Wearesho\Bobra\Ubki\Tests\Push;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class ConfigTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push
 */
class ConfigTest extends TestCase
{
    public function testGetTestRegistryUrl(): void
    {
        $url = $this->getTestConfig()->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_REGISTRY_URL, $url);
    }

    public function testGetTestPushUrl(): void
    {
        $url = $this->getTestConfig()->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::TEST_PUSH_URL, $url);
    }

    public function testGetProductionRegistryUrl(): void
    {
        $url = $this->getProductionConfig()->getRegistryUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_REGISTRY_URL, $url);
    }

    public function testGetProductionPushUrl(): void
    {
        $url = $this->getProductionConfig()->getPushUrl();
        $this->assertEquals(Ubki\Push\ConfigInterface::PRODUCTION_PUSH_URL, $url);
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\UnsupportedModeException::class);
        $this->expectExceptionMessage("Mode have invalid value 3");
        new Ubki\Push\Config('username', 'password', 3);
    }

    protected function getTestConfig(): Ubki\Push\ConfigInterface
    {
        return new Ubki\Push\Config(
            'username',
            'password',
            Ubki\Push\ConfigInterface::MODE_TEST
        );
    }

    protected function getProductionConfig(): Ubki\Push\ConfigInterface
    {
        return new Ubki\Push\Config(
            'username',
            'password',
            Ubki\Push\Config::MODE_PRODUCTION
        );
    }
}
