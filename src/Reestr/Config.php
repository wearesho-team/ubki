<?php

namespace Wearesho\Bobra\Ubki\Reestr;

use Wearesho\Bobra\Ubki;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class Config extends Ubki\Config implements ConfigInterface
{
    public function getReestrUrl(): string
    {
        return $this->mode === parent::MODE_PRODUCTION
            ? static::PRODUCTION_REESTR_URL
            : static::TEST_REESTR_URL;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === parent::MODE_PRODUCTION;
    }
}
