<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static PHYSICAL(string $description = null)
 * @method static static BUSINESS(string $description = null)
 */
final class RegistrationSpd extends Infrastructure\Dictionary
{
    /**
     * individual
     */
    public const PHYSICAL = 1;

    /**
     * individual - subject of entrepreneurial activity
     */
    public const BUSINESS = 2;
}
