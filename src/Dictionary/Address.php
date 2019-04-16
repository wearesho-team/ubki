<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Address HOME(string $description = \null)
 * @method static Address REGISTRATION(string $description = \null)
 * @method static Address ACTUAL(string $description = \null)
 * @method static Address LEGAL(string $description = \null)
 * @method static Address MAILING(string $description = \null)
 * @method static Address WORK(string $description = \null)
 */
final class Address extends Dictionary
{
    public const HOME = 1;
    public const REGISTRATION = 2;
    public const ACTUAL = 3;
    public const LEGAL = 4;
    public const MAILING = 5;
    public const WORK = 6;
}
