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
    use Authorization\ConfigTrait;

    public function getRegistryUrl(): string
    {
        $url = $this->getEnv('UBKI_REGISTRY_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_REESTR_URL
                : static::TEST_REESTR_URL;
        });

        return $url;
    }

    public function getPushUrl(): string
    {
        $url = $this->getEnv('UBKI_PUSH_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_PUSH_URL
                : static::TEST_PUSH_URL;
        });

        return $url;
    }

    public function isProductionMode(): bool
    {
        $environmentMode = (int)$this->getEnv('UBKI_REGISTRY_MODE');

        return $environmentMode === static::MODE_PRODUCTION;
    }
}
