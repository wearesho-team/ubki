<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class CompromisedPhoneType
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static SCAMMER(string $description = null)
 * @method static static PAYPHONE(string $description = null)
 * @method static static FRICKER(string $description = null)
 */
final class CompromisedPhoneType extends Reference
{
    public const SCAMMER = 1;
    public const PAYPHONE = 2;
    public const FRICKER = 3;
}
