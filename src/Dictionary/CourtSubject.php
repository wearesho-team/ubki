<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CourtSubject
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CourtSubject PLAINTIFF(string $description = \null)
 * @method static CourtSubject DEFENDANT(string $description = \null)
 * @method static CourtSubject THIRD_PERSON_WITH_REQUIREMENTS(string $description = \null)
 * @method static CourtSubject THIRD_PERSON_WITHOUT_REQUIREMENTS(string $description = \null)
 * @method static CourtSubject REPRESENTATIVE(string $description = \null)
 */
final class CourtSubject extends Dictionary
{
    public const PLAINTIFF = 1;
    public const DEFENDANT = 2;
    public const THIRD_PERSON_WITH_REQUIREMENTS = 3;
    public const THIRD_PERSON_WITHOUT_REQUIREMENTS = 4;
    public const REPRESENTATIVE = 5;
}
