<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Currency
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
    public const BYN = 974;
    public const CHF = 756;
    public const EUR = 978;
    public const GBP = 826;
    public const GEL = 981;
    public const PLN = 985;
    public const RUB = 643;
    public const UAH = 980;
    public const USD = 840;
    public const XAG = 961;
    public const XAU = 959;
}
