<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class SocialStatus
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static FULL_TIME(string $description = null)
 * @method static static TERM_TIME(string $description = null)
 * @method static static TEMP_UNEMPLOYED(string $description = null)
 * @method static static PART_TIME(string $description = null)
 * @method static static STUDENT(string $description = null)
 * @method static static PENSIONER(string $description = null)
 * @method static static PENSIONER_WORK(string $description = null)
 * @method static static MATERNITY_LEAVE(string $description = null)
 * @method static static OTHER(string $description = null)
 */
final class SocialStatus extends Infrastructure\Dictionary
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
