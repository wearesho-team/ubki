<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Horat1us\Environment;
use Wearesho\Bobra\Ubki;

/**
 * Class EnvironmentConfig
 *
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class EnvironmentConfig extends Environment\Config implements Ubki\Authorization\ConfigInterface
{
    use Ubki\Authorization\ConfigTrait;

    public const PRODUCTION_REESTR_URL = 'https://secure.ubki.ua/upload/in/reestrs.php';
    public const PRODUCTION_PUSH_URL = '';

    public const TEST_REESTR_URL = 'https://secure.ubki.ua:4040/upload/in/reestrs.php';
    public const TEST_PUSH_URL = 'https://secure.ubki.ua:4040/upload/data/xml';

    public function getUsername(): string
    {
        return $this->getEnv('USERNAME');
    }

    public function getPassword(): string
    {
        return $this->getEnv('PASSWORD');
    }

    public function getRegistryUrl()
    {
        $url = $this->getEnv('REGISTRY_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_REESTR_URL
                : static::TEST_REESTR_URL;
        });

        return $url;
    }

    public function getPushUrl(): string
    {
        $url = $this->getEnv('PUSH_URL', function (): string {
            return $this->isProductionMode()
                ? static::PRODUCTION_PUSH_URL
                : static::TEST_PUSH_URL;
        });

        return $url;
    }

    /**
     * @return bool
     * @throws Ubki\Authorization\UnsupportedModeException
     */
    public function isProductionMode(): bool
    {
        $environmentMode = (int)$this->getEnv('REGISTRY_MODE');

        switch ($environmentMode) {
            case static::MODE_PRODUCTION:
                return true;
            case static::MODE_TEST:
                return false;
            default:
                throw new Ubki\Authorization\UnsupportedModeException($environmentMode);
        }
    }
}
