<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class InsuranceDealType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static InsuranceDealType CASCO()
 * @method static InsuranceDealType OSAGO()
 * @method static InsuranceDealType ACCIDENT()
 */
class InsuranceDealType extends Enum
{
    public const CASCO = 1;
    public const OSAGO = 2;
    public const ACCIDENT = 3;
}
