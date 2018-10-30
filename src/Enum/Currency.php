<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class Currency
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static Currency BYN()
 * @method static Currency CHF()
 * @method static Currency EUR()
 * @method static Currency GBP()
 * @method static Currency GEL()
 * @method static Currency PLN()
 * @method static Currency RUB()
 * @method static Currency UAH()
 * @method static Currency USD()
 * @method static Currency XAG()
 * @method static Currency XAU()
 */
final class Currency extends Enum
{
    /** @var int The Belarusian Ruble */
    public const BYN = 974;

    /** @var int Swiss frank */
    public const CHF = 756;

    /** @var int Euro */
    public const EUR = 978;

    /** @var int British Pound Sterling */
    public const GBP = 826;

    /** @var int Lari */
    public const GEL = 981;

    /** @var int Polish Zloty */
    public const PLN = 985;

    /** @var int Russian ruble */
    public const RUB = 643;

    /** @var int Ukrainian Hryvnia */
    public const UAH = 980;

    /** @var int U.S. dollar */
    public const USD = 840;

    /** @var int Silver */
    public const XAG = 961;

    /** @var int Gold */
    public const XAU = 959;
}
