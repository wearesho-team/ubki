<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class AddressType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static HOME(string $description = null)
 * @method static static REGISTRATION(string $description = null)
 * @method static static ACTUAL(string $description = null)
 * @method static static LEGAL(string $description = null)
 * @method static static MAILING(string $description = null)
 * @method static static WORK(string $description = null)
 */
final class AddressType extends Infrastructure\Dictionary
{
    public const HOME = 1;
    public const REGISTRATION = 2;
    public const ACTUAL = 3;
    public const LEGAL = 4;
    public const MAILING = 5;
    public const WORK = 6;
}
