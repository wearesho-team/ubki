<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Config implements ConfigInterface
{
    public const MODE_PRODUCTION = 'Production';
    public const MODE_TEST = 'Test';

    /** @var string */
    protected $mode;

    public function __construct(string $mode)
    {
        $this->validateMode($mode);

        $this->mode = $mode;
    }

    public function getReestrUrl(): string
    {
        return $this->mode === static::MODE_PRODUCTION
            ? static::PRODUCTION_REESTR_URL
            : static::TEST_REESTR_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === static::MODE_PRODUCTION;
    }

    private function validateMode(string $mode): void
    {
        $isInvalid =
            $mode !== static::MODE_PRODUCTION &&
            $mode !== static::MODE_TEST;

        if ($isInvalid) {
            throw new \InvalidArgumentException("Mode have invalid value: {$mode}");
        }
    }
}
