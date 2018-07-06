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
        return $this->mode === Config::MODE_PRODUCTION
            ? ConfigInterface::PRODUCTION_REESTR_URL
            : ConfigInterface::TEST_REESTR_URL;
    }

    public function isTestMode(): string
    {
        return $this->mode === static::MODE_TEST;
    }
}
