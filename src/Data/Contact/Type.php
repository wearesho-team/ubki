<?php

namespace Wearesho\Bobra\Ubki\Data\Contact;

use Wearesho\Bobra\Ubki;

/**
 * Class Type
 * @package Wearesho\Bobra\Ubki\Data\Contact
 *
 * @method static static HOME(string $description = null)
 * @method static static WORK(string $description = null)
 * @method static static MOBILE(string $description = null)
 * @method static static EMAIL(string $description = null)
 * @method static static FAX(string $description = null)
 */
final class Type extends Ubki\Reference
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
