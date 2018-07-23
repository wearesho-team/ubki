<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface ConfigInterface extends Authorization\ConfigInterface
{
    public const PRODUCTION_PULL_URL = '';

    public const TEST_PULL_URL = '';

    public function getPullUrl(): string;
}
