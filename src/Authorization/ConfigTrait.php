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

    /** @var int */
    protected $mode;

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

    public function getMode(): int
    {
        return $this->mode;
    }

    public function isProductionMode(): bool
    {
        return $this->mode === ConfigInterface::MODE_PRODUCTION;
    }
}
