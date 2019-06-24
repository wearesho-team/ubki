<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Gender
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Gender MAN(string $description = \null)
 * @method static Gender WOMAN(string $description = \null)
 */
final class Gender extends Dictionary
{
    public const MAN = 1;
    public const WOMAN = 2;
}
