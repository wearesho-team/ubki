<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface ConfigInterface extends Authorization\ConfigInterface
{
    public const PRODUCTION_PULL_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/xml';

    public const TEST_PULL_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/xml';

    public function getPullUrl(): string;
}
