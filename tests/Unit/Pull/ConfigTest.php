<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Pull;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ConfigTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Pull
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Pull\Config
 * @internal
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
        $config = $this->createConfig(Ubki\Pull\ConfigInterface::MODE_TEST);

        return [
            [Ubki\Pull\ConfigInterface::TEST_PULL_URL, $config->getPullUrl(),],
            [Ubki\Pull\ConfigInterface::TEST_AUTH_URL, $config->getAuthUrl(),],
        ];
    }

    public function providerConfigProductionMode($a): array
    {
        $config = $this->createConfig(Ubki\Pull\ConfigInterface::MODE_PRODUCTION);

        return [
            [Ubki\Pull\ConfigInterface::PRODUCTION_PULL_URL, $config->getPullUrl(),],
            [Ubki\Pull\ConfigInterface::PRODUCTION_AUTH_URL, $config->getAuthUrl(),],
        ];
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\Exception\UnsupportedMode::class);
        $this->expectExceptionMessage("Mode have invalid value 3");

        $this->createConfig(3);
    }

    protected function createConfig(int $mode): Ubki\Pull\ConfigInterface
    {
        return new Ubki\Pull\Config(static::USERNAME, static::PASSWORD, $mode);
    }
}
