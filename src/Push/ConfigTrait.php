<?php

namespace Wearesho\Bobra\Ubki\Push;

/**
 * Trait ConfigTrait
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
trait ConfigTrait
{
    /** @var int */
    protected $mode;

    public function getRegistryUrl(): string
    {
        return $this->isProductionMode()
            ? static::PRODUCTION_REGISTRY_URL
            : static::TEST_REGISTRY_URL;
    }

    public function getPushUrl(): string
    {
        return $this->isProductionMode()
            ? static::PRODUCTION_PUSH_URL
            : static::TEST_PUSH_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === static::MODE_PRODUCTION;
    }
}
