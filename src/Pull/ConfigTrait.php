<?php

namespace Wearesho\Bobra\Ubki\Pull;

/**
 * Trait ConfigTrait
 * @package Wearesho\Bobra\Ubki\Pull
 */
trait ConfigTrait
{
    /** @var int */
    protected $mode;

    public function getPullUrl(): string
    {
        return $this->isProductionMode()
            ? static::PRODUCTION_PULL_URL
            : static::TEST_PULL_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === static::MODE_PRODUCTION;
    }
}
