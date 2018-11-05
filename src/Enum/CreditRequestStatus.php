<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CreditRequestStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CreditRequestStatus VERIFICATION()
 * @method static CreditRequestStatus AGREED()
 * @method static CreditRequestStatus REFUSAL()
 * @method static CreditRequestStatus PZ30()
 * @method static CreditRequestStatus PZ90()
 * @method static CreditRequestStatus FPD30()
 * @method static CreditRequestStatus FPSPD_TPD_DEFOLT()
 */
final class CreditRequestStatus extends Enum
{
    public const VERIFICATION = 1;
    public const AGREED = 2;
    public const REFUSAL = 3;
    public const PZ30 = 4;
    public const PZ90 = 5;
    public const FPD30 = 6;
    public const FPSPD_TPD_DEFOLT = 7;
}
