<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static HOME($description = null)
 * @method static static WORK()
 * @method static static MOBILE()
 * @method static static EMAIL()
 * @method static static FAX()
 */
final class Contact extends Ubki\Reference
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
