<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class ContactRole
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static ContactRole MAIN()
 * @method static ContactRole ADDITIONAL()
 * @method static ContactRole THIRD_PERSON()
 */
final class ContactRole extends Enum
{
    public const MAIN = 1;
    public const ADDITIONAL = 2;
    public const THIRD_PERSON = 3;
}
