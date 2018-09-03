<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static PHYSICAL(string $description = null)
 * @method static static BUSINESS(string $description = null)
 */
final class RegistrationSpd extends Reference
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
