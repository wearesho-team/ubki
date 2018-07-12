<?php

namespace Wearesho\Bobra\Ubki\Push;

use Horat1us\Environment;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class EnvironmentConfig
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    use Authorization\EnvironmentConfigTrait;

    public function getRegistryUrl(): string
    {
        $url = $this->getEnv('REGISTRY_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_REGISTRY_URL
                : static::TEST_REGISTRY_URL;
        });

        return $url;
    }

    public function getPushUrl(): string
    {
        $url = $this->getEnv('PUSH_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_PUSH_URL
                : static::TEST_PUSH_URL;
        });

        return $url;
    }
}
