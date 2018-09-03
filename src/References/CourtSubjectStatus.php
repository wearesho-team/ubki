<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class CourtSubjectStatus
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static PLAINTIFF(string $description = null)
 * @method static static DEFENDANT(string $description = null)
 * @method static static THIRD_PERSON_WITH_REQUIREMENTS(string $description = null)
 * @method static static THIRD_PERSON_WITHOUT_REQUIREMENTS(string $description = null)
 * @method static static REPRESENTATIVE(string $description = null)
 */
final class CourtSubjectStatus extends Reference
{
    public const PLAINTIFF = 1;
    public const DEFENDANT = 2;
    public const THIRD_PERSON_WITH_REQUIREMENTS = 3;
    public const THIRD_PERSON_WITHOUT_REQUIREMENTS = 4;
    public const REPRESENTATIVE = 5;
}
