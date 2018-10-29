<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static Language RUS()
 * @method static Language UKR()
 * @method static Language KAT()
 * @method static Language ENG()
 * @method static Language LAV()
 * @method static Language ELL()
 * @method static Language ZHO()
 * @method static Language KAZ()
 */
final class Language extends Enum
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
