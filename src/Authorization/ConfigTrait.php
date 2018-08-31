<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Trait ConfigTrait
 * @package Wearesho\Bobra\Ubki\Authorization
 */
trait ConfigTrait
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $password;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getAuthUrl(): string
    {
        return $this->isProductionMode()
            ? ConfigInterface::PRODUCTION_AUTH_URL
            : ConfigInterface::TEST_AUTH_URL;
    }

    public abstract function isProductionMode(): bool;
}
