<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Role
 * @package Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson
 *
 * @method static static FOUNDER(string $description = null)
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 */
final class Role extends Reference
{
    public const FOUNDER = 1;
    public const DIRECTOR = 2;
    public const MANAGER = 3;
}
