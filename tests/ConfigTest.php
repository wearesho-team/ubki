<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ConfigTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @internal
 */
class ConfigTest extends TestCase
{
    public function testGetters()
    {
        $config = new Ubki\Config(
            $username = 'UserName',
            $password = 'PassWord',
            $mode = Ubki\Config::MODE_PRODUCTION
        );

        $this->assertEquals($username, $config->getUsername());
        $this->assertEquals($password, $config->getPassword());
        $this->assertEquals(Ubki\ConfigInterface::PRODUCTION_AUTH_URL, $config->getAuthUrl());
        $this->assertEquals(Ubki\ConfigInterface::PRODUCTION_PULL_URL, $config->getPullUrl());
        $this->assertEquals(Ubki\ConfigInterface::PRODUCTION_PUSH_URL, $config->getPushUrl());

        $testConfig = $config->setMode(Ubki\Config::MODE_TEST);
        $this->assertFalse($testConfig === $config, "Config should be immutable");

        $this->assertEquals(Ubki\ConfigInterface::TEST_AUTH_URL, $testConfig->getAuthUrl());
        $this->assertEquals(Ubki\ConfigInterface::TEST_PULL_URL, $testConfig->getPullUrl());
        $this->assertEquals(Ubki\ConfigInterface::TEST_PUSH_URL, $testConfig->getPushUrl());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidMode()
    {
        new Ubki\Config('username', 'password', 'invalid-mode');
    }
}
