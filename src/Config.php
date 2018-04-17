<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Config
 * @package Wearesho\Bobra\Ubki
 *
 * @immutable
 */
class Config implements ConfigInterface
{
    public const MODE_PRODUCTION = 'Production';
    public const MODE_TEST = 'Test';

    /** @var string */
    protected $username;

    /** @var string */
    protected $password;

    protected $mode = Config::MODE_TEST;

    public function __construct(string $username, string $password, string $mode = Config::MODE_TEST)
    {
        $this->username = $username;
        $this->password = $password;

        $isModeValid = $mode === Config::MODE_TEST || $mode === Config::MODE_PRODUCTION;
        if (!$isModeValid) {
            throw new \InvalidArgumentException("Invalid Mode: $mode");
        }
        $this->mode = $mode;
    }

    public function setMode(string $mode): Config
    {
        return new Config($this->username, $this->password, $mode);
    }

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
        return $this->mode === Config::MODE_PRODUCTION
            ? ConfigInterface::PRODUCTION_AUTH_URL
            : ConfigInterface::TEST_AUTH_URL;
    }

    public function getPullUrl(): string
    {
        return $this->mode === Config::MODE_PRODUCTION
            ? Config::PRODUCTION_PULL_URL
            : Config::TEST_PULL_URL;
    }

    public function getPushUrl(): string
    {
        return $this->mode === Config::MODE_PRODUCTION
            ? Config::PRODUCTION_PUSH_URL
            : Config::TEST_PUSH_URL;
    }
}
