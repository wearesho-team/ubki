<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Pull;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class EnvironmentConfigTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Pull
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Pull\EnvironmentConfig
 * @internal
 */
class EnvironmentConfigTest extends TestCase
{
    /** @var Ubki\Pull\ConfigInterface */
    protected $configTestMode;

    /** @var Ubki\Pull\ConfigInterface */
    protected $configProductionMode;

    public function setUp(): void
    {
        putenv('TEST_PULL_MODE=' . Ubki\Pull\EnvironmentConfig::MODE_TEST);
        putenv('TEST_PULL_URL=' . Ubki\Pull\EnvironmentConfig::TEST_PULL_URL);
        $this->configTestMode = new Ubki\Pull\EnvironmentConfig('TEST_PULL_');

        putenv('PRODUCTION_PULL_MODE=' . Ubki\Pull\EnvironmentConfig::MODE_PRODUCTION);
        putenv('PRODUCTION_PULL_URL=' . Ubki\Pull\EnvironmentConfig::PRODUCTION_PULL_URL);
        $this->configProductionMode = new Ubki\Pull\EnvironmentConfig('PRODUCTION_PULL_');
    }

    public function testGetTestPullUrl(): void
    {
        $url = $this->configTestMode->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::TEST_PULL_URL, $url);
    }

    public function testGetProductionPullUrl(): void
    {
        $url = $this->configProductionMode->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::PRODUCTION_PULL_URL, $url);
    }

    public function testGetDefaultUrls(): void
    {
        putenv('TEST_PREFIX_MODE=' . Ubki\Pull\EnvironmentConfig::MODE_TEST);
        putenv('PRODUCTION_PREFIX_MODE=' . Ubki\Pull\EnvironmentConfig::MODE_PRODUCTION);

        $config = new Ubki\Pull\EnvironmentConfig('TEST_PREFIX_');
        $url = $config->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::TEST_PULL_URL, $url);

        $config = new Ubki\Pull\EnvironmentConfig('PRODUCTION_PREFIX_');
        $url = $config->getPullUrl();
        $this->assertEquals(Ubki\Pull\ConfigInterface::PRODUCTION_PULL_URL, $url);
    }

    public function testDefaultPrefix(): void
    {
        putenv('UBKI_PULL_USERNAME=username');
        putenv('UBKI_PULL_PASSWORD=password');
        putenv('UBKI_PULL_MODE=' . Ubki\Pull\EnvironmentConfig::MODE_PRODUCTION);
        putenv('UBKI_PULL_URL=' . Ubki\Pull\EnvironmentConfig::PRODUCTION_PULL_URL);
        $environemntConfig = new Ubki\Pull\EnvironmentConfig();

        $this->assertEquals(
            Ubki\Pull\EnvironmentConfig::PRODUCTION_PULL_URL,
            $environemntConfig->getPullUrl()
        );
        $this->assertEquals('username', $environemntConfig->getUsername());
        $this->assertEquals('password', $environemntConfig->getPassword());
    }
}
