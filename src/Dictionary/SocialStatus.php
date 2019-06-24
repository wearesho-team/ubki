<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class SocialStatus
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static SocialStatus FULL_TIME(string $description = \null)
 * @method static SocialStatus TERM_TIME(string $description = \null)
 * @method static SocialStatus TEMP_UNEMPLOYED(string $description = \null)
 * @method static SocialStatus PART_TIME(string $description = \null)
 * @method static SocialStatus STUDENT(string $description = \null)
 * @method static SocialStatus PENSIONER(string $description = \null)
 * @method static SocialStatus PENSIONER_WORK(string $description = \null)
 * @method static SocialStatus MATERNITY_LEAVE(string $description = \null)
 * @method static SocialStatus OTHER(string $description = \null)
 */
final class SocialStatus extends Dictionary
{
    public const FULL_TIME = 1;
    public const TERM_TIME = 2;
    public const TEMP_UNEMPLOYED = 3;
    public const PART_TIME = 4;
    public const STUDENT = 5;
    public const PENSIONER = 6;
    public const PENSIONER_WORK = 7;
    public const MATERNITY_LEAVE = 8;
    public const OTHER = 9;
}
