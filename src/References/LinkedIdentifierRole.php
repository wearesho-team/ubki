<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class LinkedIdentifierRole
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static FOUNDER(string $description = null)
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 */
final class LinkedIdentifierRole extends Reference
{
    public const FOUNDER = 1;
    public const DIRECTOR = 2;
    public const MANAGER = 3;
}
