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

    public abstract function getAuthUrl(): string;
}
