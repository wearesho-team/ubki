<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
class Config implements ConfigInterface
{
    use Authorization\ConfigTrait;

    /** @var int */
    protected $mode;

    public function __construct(int $mode)
    {
        $this->validateMode($mode);

        $this->mode = $mode;
    }

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

    protected function validateMode(int $mode): void
    {
        $isInvalid =
            $mode !== static::MODE_PRODUCTION &&
            $mode !== static::MODE_TEST;

        if ($isInvalid) {
            // todo: remove unsupported-mode-exception to base directory
            throw new Authorization\UnsupportedModeException($mode);
        }
    }
}
