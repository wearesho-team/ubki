<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RepaymentProcedure
 * @package Wearesho\Bobra\Ubki\References
 *
 * @see     https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.kn4jicy0622q
 *
 * @method static static PAYMENT_MATURITY(string $description = null)
 * @method static static NON_REVOLVING_CREDIT_LINE(string $description = null)
 * @method static static REVOLVING_CREDIT_LINE(string $description = null)
 * @method static static OVERDRAFT(string $description = null)
 * @method static static CREDIT_LIMIT(string $description = null)
 * @method static static PAYMENTS_MONTHLY(string $description = null)
 * @method static static PAYMENTS_INDIVIDUAL(string $description = null)
 * @method static static PERIODIC_TWO_WEEKS(string $description = null)
 * @method static static PERIODIC_MONTH(string $description = null)
 * @method static static PERIODIC_TWO_MONTH(string $description = null)
 * @method static static PERIODIC_QUARTERLY(string $description = null)
 * @method static static PERIODIC_FIVE_MONTH(string $description = null)
 * @method static static PERIODIC_YEARLY(string $description = null)
 * @method static static SHEET_COMMITMENTS(string $description = null)
 */
final class RepaymentProcedure extends Reference
{
    public const PAYMENT_MATURITY = 1;
    public const NON_REVOLVING_CREDIT_LINE = 2;
    public const REVOLVING_CREDIT_LINE = 3;
    public const OVERDRAFT = 4;
    public const CREDIT_LIMIT = 5;
    public const PAYMENTS_MONTHLY = 6;
    public const PAYMENTS_INDIVIDUAL = 7;
    public const PERIODIC_TWO_WEEKS = 8;
    public const PERIODIC_MONTH = 9;
    public const PERIODIC_TWO_MONTH = 10;
    public const PERIODIC_QUARTERLY = 11;
    public const PERIODIC_FIVE_MONTH = 12;
    public const PERIODIC_YEARLY = 13;
    public const SHEET_COMMITMENTS = 14;
}
