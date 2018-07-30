<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static MAN(string $description = null)
 * @method static static WOMAN(string $description = null)
 */
final class Gender extends Ubki\Reference
{
    public const MAN = 1;
    public const WOMAN = 2;
}
