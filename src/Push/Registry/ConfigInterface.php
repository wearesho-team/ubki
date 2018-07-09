<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface ConfigInterface
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface ConfigInterface
{
    public const PRODUCTION_REESTR_URL = 'https://secure.ubki.ua/upload/in/reestrs.php';

    public const TEST_REESTR_URL = 'https://secure.ubki.ua:4040/upload/in/reestrs.php';

    public function getReestrUrl(): string;

    public function isProductionMode(): bool;
}
