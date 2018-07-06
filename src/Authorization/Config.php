<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Authorization
 */
class Config implements ConfigInterface
{
    use ConfigTrait;

    protected $mode = Config::MODE_TEST;

    public function __construct(string $username, string $password, string $mode = Config::MODE_TEST)
    {
        $this->username = $username;
        $this->password = $password;

        $this->validateMode($mode);

        $this->mode = $mode;
    }

    public function setMode(string $mode): Config
    {
        return new Config($this->username, $this->password, $mode);
    }

    protected function validateMode(string $mode): void
    {
        if (
            $mode !== Config::MODE_TEST &&
            $mode !== Config::MODE_PRODUCTION
        ) {
            throw new \InvalidArgumentException("Invalid Mode: {$mode}");
        }
    }
}
