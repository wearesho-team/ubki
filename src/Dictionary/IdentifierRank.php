<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class IdentifierRank
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static IdentifierRank DIRECTOR(string $description = \null)
 * @method static IdentifierRank MANAGER(string $description = \null)
 * @method static IdentifierRank SPECIALIST(string $description = \null)
 * @method static IdentifierRank FREELANCER(string $description = \null)
 */
final class IdentifierRank extends Dictionary
{
    public const DIRECTOR = 1;
    public const MANAGER = 2;
    public const SPECIALIST = 3;
    public const FREELANCER = 4;
}
