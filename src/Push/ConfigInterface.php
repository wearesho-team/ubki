<?php

namespace Wearesho\Bobra\Ubki\Push;

/**
 * Interface ConfigInterface
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
interface ConfigInterface
{
    public const MODE_PRODUCTION = 1;
    public const MODE_TEST = 0;

    public const PRODUCTION_REESTR_URL = 'https://secure.ubki.ua/upload/in/reestrs.php';
    public const PRODUCTION_PUSH_URL = '';

    public const TEST_REESTR_URL = 'https://secure.ubki.ua:4040/upload/in/reestrs.php';
    public const TEST_PUSH_URL = '';

    public function getReestrUrl(): string;

    public function getPushUrl(): string;

    public function isProductionMode(): bool;
}
