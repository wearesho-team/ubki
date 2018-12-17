<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class LinkedIdentifierRole
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static FOUNDER(string $description = null)
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 */
final class LinkedIdentifierRole extends Infrastructure\Dictionary
{
    public const FOUNDER = 1;
    public const DIRECTOR = 2;
    public const MANAGER = 3;
}
