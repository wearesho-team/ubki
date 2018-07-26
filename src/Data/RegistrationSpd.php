<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static PHYSICAL(string $description = null)
 * @method static static BUSINESS(string $description = null)
 */
final class RegistrationSpd extends Ubki\Reference
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
