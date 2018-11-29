<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class AddressType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static AddressType HOME(string $description = null)
 * @method static AddressType REGISTRATION(string $description = null)
 * @method static AddressType ACTUAL(string $description = null)
 * @method static AddressType LEGAL(string $description = null)
 * @method static AddressType MAILING(string $description = null)
 * @method static AddressType WORK(string $description = null)
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
