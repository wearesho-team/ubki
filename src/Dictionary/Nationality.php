<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Nationality
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Nationality STATELESS(string $description = \null)
 * @method static Nationality ARMENIA(string $description = \null)
 * @method static Nationality AZERBAIJAN(string $description = \null)
 * @method static Nationality BELARUS(string $description = \null)
 * @method static Nationality GERMANY(string $description = \null)
 * @method static Nationality GEORGIA(string $description = \null)
 * @method static Nationality ISRAEL(string $description = \null)
 * @method static Nationality KAZAKHSTAN(string $description = \null)
 * @method static Nationality TURKEY(string $description = \null)
 * @method static Nationality UKRAINE(string $description = \null)
 * @method static Nationality USA(string $description = \null)
 * @method static Nationality UZBEKISTAN(string $description = \null)
 * @method static Nationality POLAND(string $description = \null)
 * @method static Nationality RUSSIAN_FEDERATION(string $description = \null)
 */
final class Nationality extends Dictionary
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
