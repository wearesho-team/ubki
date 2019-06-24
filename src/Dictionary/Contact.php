<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Contact HOME(string $description = \null)
 * @method static Contact WORK(string $description = \null)
 * @method static Contact MOBILE(string $description = \null)
 * @method static Contact EMAIL(string $description = \null)
 * @method static Contact FAX(string $description = \null)
 */
final class Contact extends Dictionary
{
    public const HOME = 1;
    public const WORK = 2;
    public const MOBILE = 3;
    public const EMAIL = 4;
    public const FAX = 5;
}
