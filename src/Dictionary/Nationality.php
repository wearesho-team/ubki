<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Nationality
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static STATELESS(string $description = null)
 * @method static static ARMENIA(string $description = null)
 * @method static static AZERBAIJAN(string $description = null)
 * @method static static BELARUS(string $description = null)
 * @method static static GERMANY(string $description = null)
 * @method static static GEORGIA(string $description = null)
 * @method static static ISRAEL(string $description = null)
 * @method static static KAZAKHSTAN(string $description = null)
 * @method static static TURKEY(string $description = null)
 * @method static static UKRAINE(string $description = null)
 * @method static static USA(string $description = null)
 * @method static static UZBEKISTAN(string $description = null)
 * @method static static POLAND(string $description = null)
 * @method static static RUSSIAN_FEDERATION(string $description = null)
 */
final class Nationality extends Infrastructure\Dictionary
{
    public const STATELESS = 1;
    public const AZERBAIJAN = 31;
    public const ARMENIA = 51;
    public const BELARUS = 112;
    public const GEORGIA = 268;
    public const GERMANY = 276;
    public const ISRAEL = 376;
    public const KAZAKHSTAN = 398;
    public const POLAND = 616;
    public const RUSSIAN_FEDERATION = 643;
    public const TURKEY = 792;
    public const UKRAINE = 804;
    public const USA = 840;
    public const UZBEKISTAN = 860;
}
