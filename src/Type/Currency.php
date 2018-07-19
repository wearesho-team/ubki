<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Currency
 * Used iso-4217 standard
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static BYN(string $description = null)
 * @method static static CHF(string $description = null)
 * @method static static EUR(string $description = null)
 * @method static static GBP(string $description = null)
 * @method static static GEL(string $description = null)
 * @method static static PLN(string $description = null)
 * @method static static RUB(string $description = null)
 * @method static static UAH(string $description = null)
 * @method static static USD(string $description = null)
 * @method static static XAG(string $description = null)
 * @method static static XAU(string $description = null)
 */
class Currency extends Reference
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
