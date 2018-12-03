<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Authorization
 */
interface ConfigInterface extends Infrastructure\ConfigInterface
{
    public const PRODUCTION_AUTH_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/auth';
    public const TEST_AUTH_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/auth';

    public function getAuthUrl(): string;
}
