<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static MAN(string $description = null)
 * @method static static WOMAN(string $description = null)
 */
final class Gender extends Reference
{
    public const MAN = 1;
    public const WOMAN = 2;
}
