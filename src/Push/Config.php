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

    public function __construct(int $mode)
    {
        $this->validateMode($mode);

        $this->mode = $mode;
    }

    public function getRegistryUrl(): string
    {
        return $this->mode === static::MODE_PRODUCTION
            ? static::PRODUCTION_REESTR_URL
            : static::TEST_REESTR_URL;
    }

    public function getPushUrl(): string
    {
        return $this->mode === static::MODE_PRODUCTION
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
            throw new \InvalidArgumentException("Mode have invalid value: {$mode}");
        }
    }
}
