<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class EnvironmentConfigTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @internal
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var Ubki\EnvironmentConfig */
    protected $config;

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new Ubki\EnvironmentConfig();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     */
    public function testMissingUsername()
    {
        putenv('UBKI_USERNAME');
        $this->config->getUsername();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     */
    public function testMissingPassword()
    {
        putenv('UBKI_PASSWORD');
        $this->config->getPassword();
    }

    public function testValidEnvironment()
    {
        putenv('UBKI_USERNAME=username');
        putenv('UBKI_PASSWORD=password');
        $this->assertEquals(
            'username',
            $this->config->getUsername()
        );
        $this->assertEquals(
            'password',
            $this->config->getPassword()
        );
        putenv('UBKI_USERNAME');
        putenv('UBKI_PASSWORD');
    }

    public function testAuthUrl()
    {
        putenv('UBKI_AUTH_URL');
        $this->assertEquals(
            Ubki\ConfigInterface::PRODUCTION_AUTH_URL,
            $this->config->getAuthUrl()
        );
        putenv('UBKI_AUTH_URL=https://wearesho.com/auth');
        $this->assertEquals(
            'https://wearesho.com/auth',
            $this->config->getAuthUrl()
        );
        putenv('UBKI_AUTH_URL');
    }

    public function testPullUrl()
    {
        putenv('UBKI_PULL_URL');
        $this->assertEquals(
            Ubki\ConfigInterface::PRODUCTION_PULL_URL,
            $this->config->getPullUrl()
        );
        putenv('UBKI_PULL_URL=https://wearesho.com/pull');
        $this->assertEquals(
            'https://wearesho.com/pull',
            $this->config->getPullUrl()
        );
        putenv('UBKI_PULL_URL');
    }

    public function testPushUrl()
    {
        putenv('UBKI_PUSH_URL');
        $this->assertEquals(
            Ubki\ConfigInterface::PRODUCTION_PUSH_URL,
            $this->config->getPushUrl()
        );
        putenv('UBKI_PUSH_URL=https://wearesho.com/push');
        $this->assertEquals(
            'https://wearesho.com/push',
            $this->config->getPushUrl()
        );
        putenv('UBKI_PUSH_URL');
    }
}
