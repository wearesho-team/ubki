<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SubjectRank
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SubjectRank DIRECTOR()
 * @method static SubjectRank MANAGER()
 * @method static SubjectRank SPECIALIST()
 * @method static SubjectRank FREELANCER()
 */
class SubjectRank extends Enum
{
    public const DIRECTOR = 1;
    public const MANAGER = 2;
    public const SPECIALIST = 3;
    public const FREELANCER = 4;
}
