<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static RU()
 * @method static static UA()
 * @method static static EN()
 */
final class Language extends Ubki\Reference
{
    public const RU = 1;
    public const UA = 2;
    public const EN = 4;
}
