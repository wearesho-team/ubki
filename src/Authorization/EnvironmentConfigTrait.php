<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Trait EnvironmentConfigTrait
 *
 * @package Wearesho\Bobra\Ubki\Authorization
 */
trait EnvironmentConfigTrait
{
    public function getUsername(): string
    {
        return $this->getEnv('USERNAME');
    }

    public function getPassword(): string
    {
        return $this->getEnv('PASSWORD');
    }

    public function getAuthUrl(): string
    {
        $url = $this->getEnv('AUTH_URL', function (): string {
            return $this->isProductionMode()
                ? ConfigInterface::PRODUCTION_AUTH_URL
                : ConfigInterface::TEST_AUTH_URL;
        });

        return $url;
    }

    public function isProductionMode(): bool
    {
        $environmentMode = (int)$this->getEnv('PUSH_MODE');

        switch ($environmentMode) {
            case static::MODE_PRODUCTION:
                return true;
            case static::MODE_TEST:
                return false;
            default:
                throw new UnsupportedModeException($environmentMode);
        }
    }
}
