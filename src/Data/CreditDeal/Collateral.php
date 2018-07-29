<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Collateral
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal
 *
 * @see https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.qyckc14lh0xo
 */
final class Collateral extends Reference
{
    public const GUARANTEE_LEGAL = 1;
    public const GUARANTEE_NATURAL = 2;
    public const GUARANTEE_MINISTERS = 11;
    public const GUARANTEE_NATIONAL_BANK = 12;
    public const GUARANTEE_INTERNATIONAL_BANKS = 13;
    public const GUARANTEE_OTHER_BANKS = 14;
    public const RIGHTS_CASH_DEPOSITS = 15;
    public const GUARANTEE_BANKS_AND_COUNTRIES_WITH_A_RATING = 16;
    public const RIGHTS_WITH_INVESTMENT_CLASS_RATING = 18;
    public const SECURITIES_ISSUED_BY_NBU = 19;
    public const BONDS_MORTGAGE_INSTITUTION_WITH_GUARANTEE_CMU = 20;
    public const BANK_METALS = 21;
    public const PRECIOUS_METALS = 22;
    public const GOVERNMENT_SECURITIES = 23;
    public const NON_GOVERNMENT_SECURITIES = 24;
    public const REAL_ESTATE = 25;
    // todo: add another types
}
