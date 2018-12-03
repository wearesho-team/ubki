<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ConfigInterface
{
    public const MODE_PRODUCTION = 1;
    public const MODE_TEST = 0;

    /**
     * Username for UBCH service
     *
     * @return string
     */
    public function getUsername(): string;

    /**
     * Password for UBCH service
     *
     * @return string
     */
    public function getPassword(): string;
}
