<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Interface ConfigInterface
 *
 * @package Wearesho\Bobra\Ubki\Authorization
 */
interface ConfigInterface
{
    public const MODE_PRODUCTION = 1;
    public const MODE_TEST = 0;

    public const PRODUCTION_AUTH_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/auth';
    public const TEST_AUTH_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/auth';

    public function getUsername(): string;

    public function getPassword(): string;

    public function getAuthUrl(): string;
}
