<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki\Push
 */
interface ConfigInterface extends Authorization\ConfigInterface
{
    public const PRODUCTION_REGISTRY_URL = 'https://secure.ubki.ua/upload/in/reestrs.php';
    public const PRODUCTION_PUSH_URL = 'https://secure.ubki.ua/upload/data/xml';

    public const TEST_REGISTRY_URL = 'https://secure.ubki.ua:4040/upload/in/reestrs.php';
    public const TEST_PUSH_URL = 'https://secure.ubki.ua:4040/upload/data/xml';

    public function getRegistryUrl(): string;

    public function getPushUrl(): string;
}
