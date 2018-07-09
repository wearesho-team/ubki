<?php

namespace Wearesho\Bobra\Ubki\Push;

use Horat1us\Environment;

/**
 * Class EnvironmentConfig
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    public function getReestrUrl(): string
    {
        $isProductionMode = $this->isProductionMode();

        $url = $this->getEnv('UBKI_REGISTRY_URL', function () use ($isProductionMode): string {
            return $isProductionMode
                ? static::PRODUCTION_REESTR_URL
                : static::TEST_REESTR_URL;
        });

        return $url;
    }

    public function getPushUrl(): string
    {
        $isProductionMode = $this->isProductionMode();

        $url = $this->getEnv('UBKI_PUSH_URL', function () use ($isProductionMode): string {
            return $isProductionMode
                ? static::PRODUCTION_PUSH_URL
                : static::TEST_PUSH_URL;
        });

        return $url;
    }

    public function isProductionMode(): bool
    {
        $environmentMode = (int)$this->getEnv('UBKI_REGISTRY_MODE', static::MODE_PRODUCTION);

        return $environmentMode === static::MODE_PRODUCTION;
    }
}
