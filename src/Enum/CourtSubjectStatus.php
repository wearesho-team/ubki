<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CourtSubjectStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CourtSubjectStatus PLAINTIFF()
 * @method static CourtSubjectStatus DEFENDANT()
 * @method static CourtSubjectStatus THIRD_PERSON_WITH_REQUIREMENTS()
 * @method static CourtSubjectStatus THIRD_PERSON_WITHOUT_REQUIREMENTS()
 * @method static CourtSubjectStatus REPRESENTATIVE()
 */
class CourtSubjectStatus extends Enum
{
    public const PLAINTIFF = 1;
    public const DEFENDANT = 2;
    public const THIRD_PERSON_WITH_REQUIREMENTS = 3;
    public const THIRD_PERSON_WITHOUT_REQUIREMENTS = 4;
    public const REPRESENTATIVE = 5;
}
