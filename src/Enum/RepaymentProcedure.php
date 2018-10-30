<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class RepaymentProcedure
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static RepaymentProcedure PAYMENT_MATURITY()
 * @method static RepaymentProcedure NON_REVOLVING_CREDIT_LINE()
 * @method static RepaymentProcedure REVOLVING_CREDIT_LINE()
 * @method static RepaymentProcedure OVERDRAFT()
 * @method static RepaymentProcedure CREDIT_LIMIT()
 * @method static RepaymentProcedure PAYMENTS_MONTHLY()
 * @method static RepaymentProcedure PAYMENTS_INDIVIDUAL()
 * @method static RepaymentProcedure PERIODIC_TWO_WEEKS()
 * @method static RepaymentProcedure PERIODIC_MONTH()
 * @method static RepaymentProcedure PERIODIC_TWO_MONTH()
 * @method static RepaymentProcedure PERIODIC_QUARTERLY()
 * @method static RepaymentProcedure PERIODIC_FIVE_MONTH()
 * @method static RepaymentProcedure PERIODIC_YEARLY()
 * @method static RepaymentProcedure SHEET_COMMITMENTS()
 */
final class RepaymentProcedure extends Enum
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
