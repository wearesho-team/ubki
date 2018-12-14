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
    protected const USERNAME = 'username';
    protected const PASSWORD = 'password';

    /**
     * @param string $expectUrl
     * @param string $needUrl
     *
     * @dataProvider providerConfigTestMode
     * @dataProvider providerConfigProductionMode
     */
    public function testUrls(string $expectUrl, string $needUrl): void
    {
        $this->assertEquals($expectUrl, $needUrl);
    }

    public function providerConfigTestMode(): array
    {
        $config = $this->createConfig(Ubki\Push\ConfigInterface::MODE_TEST);

        return [
            [Ubki\Push\ConfigInterface::TEST_REGISTRY_URL, $config->getRegistryUrl(),],
            [Ubki\Push\ConfigInterface::TEST_PUSH_URL, $config->getPushUrl(),],
        ];
    }

    public function providerConfigProductionMode(): array
    {
        $config = $this->createConfig(Ubki\Push\ConfigInterface::MODE_PRODUCTION);

        return [
            [Ubki\Push\ConfigInterface::PRODUCTION_REGISTRY_URL, $config->getRegistryUrl(),],
            [Ubki\Push\ConfigInterface::PRODUCTION_PUSH_URL, $config->getPushUrl(),],
        ];
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\Exception\UnsupportedMode::class);
        $this->expectExceptionMessage("Mode have invalid value 3");

        $this->createConfig(3);
    }

    protected function createConfig(int $mode): Ubki\Push\ConfigInterface
    {
        return new Ubki\Push\Config(static::USERNAME, static::PASSWORD, $mode);
    }
}
