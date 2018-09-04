<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CityType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static VILLAGE(string $description = null)
 * @method static static SETTLEMENT(string $description = null)
 * @method static static URBAN_VILLAGE(string $description = null)
 * @method static static TOWN(string $description = null)
 */
final class CityType extends Dictionary
{
    public const VILLAGE = 1;
    public const SETTLEMENT = 2;
    public const URBAN_VILLAGE = 3;
    public const TOWN = 4;
}
