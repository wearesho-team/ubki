<?php

namespace Wearesho\Bobra\Ubki\Push;

use Horat1us\Environment;
use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class EnvironmentConfig
 * @package Wearesho\Bobra\Ubki\Push
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    use Authorization\EnvironmentConfigTrait;
    use EnvironmentConfigTrait;

    public function __construct(string $keyPrefix = 'UBKI_PUSH_')
    {
        parent::__construct($keyPrefix);
    }
}
