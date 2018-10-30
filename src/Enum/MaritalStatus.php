<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class MaritalStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static MaritalStatus UNMARRIED()
 * @method static MaritalStatus MARRIED()
 * @method static MaritalStatus DIVORCED()
 * @method static MaritalStatus WIDOW()
 * @method static MaritalStatus MATE()
 */
class MaritalStatus extends Enum
{
    public const UNMARRIED = 1;
    public const MARRIED = 2;
    public const DIVORCED = 3;
    public const WIDOW = 4;
    public const MATE = 5;
}
