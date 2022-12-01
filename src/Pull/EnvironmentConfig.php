<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Horat1us\Environment;
use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class EnvironmentConfig
 * @package Wearesho\Bobra\Ubki\Pull
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    use Authorization\EnvironmentConfigTrait;

    public function __construct(string $keyPrefix = 'UBKI_PULL_')
    {
        parent::__construct($keyPrefix);
    }

    public function getPullUrl(): string
    {
        $url = $this->getEnv('URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_PULL_URL
                : static::TEST_PULL_URL;
        });

        return $url;
    }
}
