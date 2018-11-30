<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CompromisedPhoneType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static CompromisedPhoneType SCAMMER(string $description = null)
 * @method static CompromisedPhoneType PAYPHONE(string $description = null)
 * @method static CompromisedPhoneType FRICKER(string $description = null)
 *
 * @deprecated Out of exploitation since 2018-10-23
 */
final class CompromisedPhoneType extends Infrastructure\Dictionary
{
    public const SCAMMER = 1;
    public const PAYPHONE = 2;
    public const FRICKER = 3;
}
