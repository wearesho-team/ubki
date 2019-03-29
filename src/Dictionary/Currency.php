<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Currency
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @see https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#
 *
 * @method static Currency BYN(string $description = null)
 * @method static Currency CHF(string $description = null)
 * @method static Currency EUR(string $description = null)
 * @method static Currency GBP(string $description = null)
 * @method static Currency GEL(string $description = null)
 * @method static Currency PLN(string $description = null)
 * @method static Currency RUB(string $description = null)
 * @method static Currency UAH(string $description = null)
 * @method static Currency USD(string $description = null)
 * @method static Currency XAG(string $description = null)
 * @method static Currency XAU(string $description = null)
 */
final class Currency extends Dictionary
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
