<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class SubjectRole
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static static BORROWER(string $description = null)
 * @method static static GUARANTOR(string $description = null)
 * @method static static PLEDGOR(string $description = null)
 */
class SubjectRole extends Reference
{
    public const BORROWER = 1;
    public const GUARANTOR = 2;
    public const PLEDGOR = 3;
}
