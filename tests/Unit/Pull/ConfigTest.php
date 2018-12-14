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

    public function testTestMode(): void
    {
        $config = new Ubki\Pull\Config(
            static::USERNAME,
            static::PASSWORD,
            Ubki\Pull\ConfigInterface::MODE_TEST
        );

        $this->assertEquals(Ubki\Pull\ConfigInterface::TEST_PULL_URL, $config->getPullUrl());
        $this->assertEquals(Ubki\Pull\ConfigInterface::MODE_TEST, $config->getMode());
    }

    public function testProductionMode(): void
    {
        $config = new Ubki\Pull\Config(
            static::USERNAME,
            static::PASSWORD,
            Ubki\Pull\ConfigInterface::MODE_PRODUCTION
        );

        $this->assertEquals(Ubki\Pull\ConfigInterface::PRODUCTION_PULL_URL, $config->getPullUrl());
        $this->assertEquals(Ubki\Pull\ConfigInterface::MODE_PRODUCTION, $config->getMode());
    }

    public function testInvalidMode(): void
    {
        $this->expectException(Ubki\Exception\UnsupportedMode::class);
        $this->expectExceptionMessage("Mode have invalid value 3");

        new Ubki\Pull\Config(static::USERNAME, static::PASSWORD, 3);
    }
}
