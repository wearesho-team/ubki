<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static RU(string $description = null)
 * @method static static UA(string $description = null)
 * @method static static EN(string $description = null)
 */
final class Language extends Ubki\Reference
{
    public const RU = 1;
    public const UA = 2;
    public const EN = 4;
}
