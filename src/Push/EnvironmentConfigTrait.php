<?php

namespace Wearesho\Bobra\Ubki\Push;

/**
 * Trait EnvironmentConfigTrait
 * @package Wearesho\Bobra\Ubki\Push
 */
trait EnvironmentConfigTrait
{
    public function getRegistryUrl(): string
    {
        $url = $this->getEnv('REGISTRY_URL', function (): string {
            return $this->isProductionMode()
                ? ConfigInterface::PRODUCTION_REGISTRY_URL
                : ConfigInterface::TEST_REGISTRY_URL;
        });

        return $url;
    }

    public function getPushUrl(): string
    {
        $url = $this->getEnv('URL', function (): string {
            return $this->isProductionMode()
                ? ConfigInterface::PRODUCTION_PUSH_URL
                : ConfigInterface::TEST_PUSH_URL;
        });

        return $url;
    }
}
