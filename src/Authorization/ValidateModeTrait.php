<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Wearesho\Bobra\Ubki;

/**
 * Trait ValidateModeTrait
 * @package Wearesho\Bobra\Ubki\Authorization
 */
trait ValidateModeTrait
{
    protected function validateMode(int $mode): void
    {
        if (!in_array($mode, [ConfigInterface::MODE_PRODUCTION, ConfigInterface::MODE_TEST])) {
            throw new Ubki\Exception\UnsupportedMode($mode);
        }
    }
}
