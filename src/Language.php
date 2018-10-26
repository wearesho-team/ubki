<?php

namespace Wearesho\Bobra\Ubki;

use MyCLabs\Enum\Enum;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki
 *
 * @method static static RU(string $description = null)
 * @method static static UA(string $description = null)
 * @method static static EN(string $description = null)
 */
class Language extends Enum
{
    public const RU = 1;
    public const UA = 2;
    public const EN = 4;
}
