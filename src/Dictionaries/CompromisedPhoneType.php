<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CompromisedPhoneType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static SCAMMER(string $description = null)
 * @method static static PAYPHONE(string $description = null)
 * @method static static FRICKER(string $description = null)
 */
final class CompromisedPhoneType extends Infrastructure\Dictionary
{
    public const SCAMMER = 1;
    public const PAYPHONE = 2;
    public const FRICKER = 3;
}
