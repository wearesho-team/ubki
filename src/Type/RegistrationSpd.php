<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static PHYSICAL(string $description = null)
 * @method static static BUSINESS(string $description = null)
 */
final class RegistrationSpd extends Ubki\Reference
{
    public const PHYSICAL = 1;
    public const BUSINESS = 2;
}
