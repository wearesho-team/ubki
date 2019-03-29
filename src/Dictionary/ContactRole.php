<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class ContactRole
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static ContactRole MAIN(string $description = null)
 * @method static ContactRole ADDITIONAL(string $description = null)
 * @method static ContactRole THIRD_PERSON(string $description = null)
 */
final class ContactRole extends Dictionary
{
    public const MAIN = 1;
    public const ADDITIONAL = 2;
    public const THIRD_PERSON = 3;
}
