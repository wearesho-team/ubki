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
            ? ConfigInterface::PRODUCTION_PULL_URL
            : ConfigInterface::TEST_PULL_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === ConfigInterface::MODE_PRODUCTION;
    }
}
