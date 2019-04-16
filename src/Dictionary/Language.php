<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * Use iso 639-3 standard
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D1%8F%D0%B7%D1%8B%D0%BA%D0%BE%D0%B2
 *
 * @method static Language RUS(string $description = \null)
 * @method static Language UKR(string $description = \null)
 * @method static Language KAT(string $description = \null)
 * @method static Language ENG(string $description = \null)
 * @method static Language LAV(string $description = \null)
 * @method static Language ELL(string $description = \null)
 * @method static Language ZHO(string $description = \null)
 * @method static Language KAZ(string $description = \null)
 */
final class Language extends Dictionary
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
