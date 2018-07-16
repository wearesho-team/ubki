<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static MAN()
 * @method static static WOMAN()
 */
final class Gender extends Ubki\Reference
{
    public const MAN = 1;
    public const WOMAN = 2;
}
