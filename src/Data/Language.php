<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Type
 * @package Wearesho\Bobra\Ubki\Data\Language
 *
 * Use iso 639-3 standard
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D1%8F%D0%B7%D1%8B%D0%BA%D0%BE%D0%B2
 *
 * @method static static RUS(string $description = null)
 * @method static static UKR(string $description = null)
 * @method static static KAT(string $description = null)
 * @method static static ENG(string $description = null)
 * @method static static LAV(string $description = null)
 * @method static static ELL(string $description = null)
 * @method static static ZHO(string $description = null)
 * @method static static KAZ(string $description = null)
 */
final class Language extends Reference
{
    /** @var int Russian */
    public const RUS = 1;

    /** @var int Ukrainian */
    public const UKR = 2;

    /** @var int Georgian */
    public const KAT = 3;

    /** @var int English */
    public const ENG = 4;

    /** @var int Lettish */
    public const LAV = 5;

    /** @var int Greek */
    public const ELL = 6;

    /** @var int Chinese */
    public const ZHO = 7;

    /** @var int Kazakh */
    public const KAZ = 8;
}
