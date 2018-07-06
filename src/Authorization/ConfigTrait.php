<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Trait ConfigTrait
 *
 * @package Wearesho\Bobra\Ubki\Authorization
 */
trait ConfigTrait
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $password;

    /** @var string */
    protected $mode;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getAuthUrl(): string
    {
        switch ($this->mode) {
            case ConfigInterface::MODE_PRODUCTION:
                return ConfigInterface::PRODUCTION_AUTH_URL;
            case ConfigInterface::MODE_TEST:
                return ConfigInterface::TEST_AUTH_URL;
            default:
                throw new \Exception("Mode have invalid value {$this->mode}");
        }
    }
}
