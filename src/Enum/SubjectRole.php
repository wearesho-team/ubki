<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SubjectRole
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SubjectRole BORROWER()
 * @method static SubjectRole GUARANTOR()
 * @method static SubjectRole PLEDGOR()
 */
final class SubjectRole extends Enum
{
    public const BORROWER = 1;
    public const GUARANTOR = 2;
    public const PLEDGOR = 3;
}
