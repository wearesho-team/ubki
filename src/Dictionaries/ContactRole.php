<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class ContactRole
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static ContactRole MAIN()
 * @method static ContactRole ADDITIONAL()
 * @method static ContactRole THIRD_PERSON()
 */
final class ContactRole extends Infrastructure\Dictionary
{
    public const MAIN = 1;
    public const ADDITIONAL = 2;
    public const THIRD_PERSON = 3;
}
