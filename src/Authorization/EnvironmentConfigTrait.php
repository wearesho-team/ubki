<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Wearesho\Bobra\Ubki;

/**
 * Trait EnvironmentConfigTrait
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

    protected function isProductionMode(): bool
    {
        $environmentMode = (int)$this->getEnv('MODE');

        switch ($environmentMode) {
            case ConfigInterface::MODE_PRODUCTION:
                return true;
            case ConfigInterface::MODE_TEST:
                return false;
            default:
                throw new Ubki\Exception\UnsupportedMode($environmentMode);
        }
    }
}
