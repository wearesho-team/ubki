<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class LinkedIdentifierRole
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static LinkedIdentifierRole FOUNDER(string $description = \null)
 * @method static LinkedIdentifierRole DIRECTOR(string $description = \null)
 * @method static LinkedIdentifierRole MANAGER(string $description = \null)
 */
final class LinkedIdentifierRole extends Dictionary
{
    public const FOUNDER = 1;
    public const DIRECTOR = 2;
    public const MANAGER = 3;
}
