<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class AddressType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static AddressType HOME()
 * @method static AddressType REGISTRATION()
 * @method static AddressType ACTUAL()
 * @method static AddressType LEGAL()
 * @method static AddressType MAILING()
 * @method static AddressType WORK()
 */
final class AddressType extends Enum
{
    public const HOME = 1;
    public const REGISTRATION = 2;
    public const ACTUAL = 3;
    public const LEGAL = 4;
    public const MAILING = 5;
    public const WORK = 6;
}
