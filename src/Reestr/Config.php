<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class Config implements ConfigInterface
{
    public const MODE_PRODUCTION = 'Production';
    public const MODE_TEST = 'Test';

    /** @var string */
    protected $mode;

    public function __construct(string $mode)
    {
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
}
