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
    public function testGetTestPullUrl(): void
    {
        $config = new Ubki\Pull\Config(
            'username',
            'password',
            Ubki\Pull\ConfigInterface::MODE_TEST
        );
        $url = $config->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::TEST_PULL_URL, $url);
    }

    public function testGetProductionPullUrl(): void
    {
        $config = new Ubki\Pull\Config(
            'username',
            'password',
            Ubki\Pull\Config::MODE_PRODUCTION
        );
        $url = $config->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::PRODUCTION_PULL_URL, $url);
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\UnsupportedModeException::class);
        $this->expectExceptionMessage("Mode have invalid value 3");
        new Ubki\Pull\Config('username', 'password', 3);
    }
}
