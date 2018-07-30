<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Work;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Rank
 * @package Wearesho\Bobra\Ubki\Data\Credential\Work
 *
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 * @method static static SPECIALIST(string $description = null)
 * @method static static FREELANCER(string $description = null)
 */
final class Rank extends Reference
{
    public const DIRECTOR = 1;
    public const MANAGER = 2;
    public const SPECIALIST = 3;
    public const FREELANCER = 4;
}
