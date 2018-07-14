<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Contact HOME($description = null)
 * @method static Contact WORK()
 * @method static Contact MOBILE()
 * @method static Contact EMAIL()
 * @method static Contact FAX()
 * @method int getValue()
 */
final class Contact extends Ubki\Reference
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
