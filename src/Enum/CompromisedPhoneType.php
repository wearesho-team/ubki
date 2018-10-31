<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CompromisedPhoneType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CompromisedPhoneType SCAMMER()
 * @method static CompromisedPhoneType PAYPHONE()
 * @method static CompromisedPhoneType FRICKER()
 */
final class CompromisedPhoneType extends Enum
{
    public const SCAMMER = 1;
    public const PAYPHONE = 2;
    public const FRICKER = 3;
}
