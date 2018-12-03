<?php

namespace Wearesho\Bobra\Ubki\Push;

/**
 * Trait ConfigTrait
 * @package Wearesho\Bobra\Ubki\Push
 */
trait ConfigTrait
{
    /** @var int */
    protected $mode;

    public function getRegistryUrl(): string
    {
        return $this->isProductionMode()
            ? ConfigInterface::PRODUCTION_REGISTRY_URL
            : ConfigInterface::TEST_REGISTRY_URL;
    }

    public function getPushUrl(): string
    {
        return $this->isProductionMode()
            ? ConfigInterface::PRODUCTION_PUSH_URL
            : ConfigInterface::TEST_PUSH_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === ConfigInterface::MODE_PRODUCTION;
    }
}
