<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CreditRequest VERIFICATION(string $description = null)
 * @method static CreditRequest AGREED(string $description = null)
 * @method static CreditRequest REFUSAL(string $description = null)
 * @method static CreditRequest PZ30(string $description = null)
 * @method static CreditRequest PZ90(string $description = null)
 * @method static CreditRequest FPD30(string $description = null)
 * @method static CreditRequest FPSPD_TPD_DEFOLT(string $description = null)
 */
final class CreditRequest extends Dictionary
{
    public const VERIFICATION = 1;
    public const AGREED = 2;
    public const REFUSAL = 3;
    public const PZ30 = 4;
    public const PZ90 = 5;
    public const FPD30 = 6;
    public const FPSPD_TPD_DEFOLT = 7;
}
