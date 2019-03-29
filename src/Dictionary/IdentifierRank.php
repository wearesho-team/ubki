<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class IdentifierRank
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static DIRECTOR(string $description = null)
 * @method static static MANAGER(string $description = null)
 * @method static static SPECIALIST(string $description = null)
 * @method static static FREELANCER(string $description = null)
 */
final class IdentifierRank extends Infrastructure\Dictionary
{
    public const DIRECTOR = 1;
    public const MANAGER = 2;
    public const SPECIALIST = 3;
    public const FREELANCER = 4;
}
