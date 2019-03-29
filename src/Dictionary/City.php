<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class City
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static City VILLAGE(string $description = null)
 * @method static City SETTLEMENT(string $description = null)
 * @method static City URBAN_VILLAGE(string $description = null)
 * @method static City TOWN(string $description = null)
 */
final class City extends Dictionary
{
    public const VILLAGE = 1;
    public const SETTLEMENT = 2;
    public const URBAN_VILLAGE = 3;
    public const TOWN = 4;
}
