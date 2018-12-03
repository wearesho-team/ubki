<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class ContactType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static ContactType HOME(string $description = null)
 * @method static ContactType WORK(string $description = null)
 * @method static ContactType MOBILE(string $description = null)
 * @method static ContactType EMAIL(string $description = null)
 * @method static ContactType FAX(string $description = null)
 */
final class ContactType extends Infrastructure\Dictionary
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
