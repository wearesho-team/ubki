<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Authorization
 */
interface ConfigInterface
{
    public const PRODUCTION_AUTH_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/auth';
    public const TEST_AUTH_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/auth';

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

    public function getAuthUrl(): string;
}
