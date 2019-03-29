<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static RegistrationSpd PHYSICAL(string $description = null)
 * @method static RegistrationSpd BUSINESS(string $description = null)
 */
final class RegistrationSpd extends Dictionary
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
