<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class ContactType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static ContactType HOME()
 * @method static ContactType WORK()
 * @method static ContactType MOBILE()
 * @method static ContactType EMAIL()
 * @method static ContactType FAX()
 */
final class ContactType extends Enum
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
