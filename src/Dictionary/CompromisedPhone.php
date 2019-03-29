<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CompromisedPhone
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CompromisedPhone SCAMMER(string $description = null)
 * @method static CompromisedPhone PAYPHONE(string $description = null)
 * @method static CompromisedPhone FRICKER(string $description = null)
 *
 * @deprecated Out of exploitation since 2018-10-23
 */
final class CompromisedPhone extends Dictionary
{
    public const SCAMMER = 1;
    public const PAYPHONE = 2;
    public const FRICKER = 3;
}
