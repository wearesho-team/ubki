<?php

namespace Wearesho\Bobra\Ubki\Reestr;

use Wearesho\Bobra\Ubki;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class EnvironmentConfig extends Ubki\EnvironmentConfig implements ConfigInterface
{
    public function getReestrUrl(): string
    {
        return $this->getEnv('UBKI_REESTR_URL', ConfigInterface::PRODUCTION_REESTR_URL);
    }

    public function isProductionMode(): bool
    {
        return true;
    }
}
