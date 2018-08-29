<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class IdentifierRank
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 * @method static static SPECIALIST(string $description = null)
 * @method static static FREELANCER(string $description = null)
 */
final class IdentifierRank extends Reference
{
    public const DIRECTOR = 1;
    public const MANAGER = 2;
    public const SPECIALIST = 3;
    public const FREELANCER = 4;
}
