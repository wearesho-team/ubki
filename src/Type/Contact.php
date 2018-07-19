<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static HOME(string $description = null)
 * @method static static WORK(string $description = null)
 * @method static static MOBILE(string $description = null)
 * @method static static EMAIL(string $description = null)
 * @method static static FAX(string $description = null)
 */
final class Contact extends Ubki\Reference
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
