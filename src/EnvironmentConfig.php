<?php

namespace Wearesho\Bobra\Ubki;

use Horat1us\Environment;

/**
 * Class EnvironmentConfig
 * @package Wearesho\Bobra\Ubki
 */
class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    /**
     * @return string
     * @throws Environment\MissingEnvironmentException
     */
    public function getUsername(): string
    {
        return $this->getEnv('UBKI_USERNAME');
    }

    /**
     * @return string
     * @throws Environment\MissingEnvironmentException
     */
    public function getPassword(): string
    {
        return $this->getEnv('UBKI_PASSWORD');
    }

    public function getAuthUrl(): string
    {
        return $this->getEnv('UBKI_AUTH_URL', ConfigInterface::PRODUCTION_AUTH_URL);
    }

    public function getPullUrl(): string
    {
        return $this->getEnv('UBKI_PULL_URL', ConfigInterface::PRODUCTION_PULL_URL);
    }

    public function getPushUrl(): string
    {
        return $this->getEnv('UBKI_PUSH_URL', ConfigInterface::PRODUCTION_PUSH_URL);
    }
}
