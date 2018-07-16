<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class SocialStatus
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static FULL_TIME_WORK(string $description = null)
 * @method static static TERM_TIME_WORK(string $description = null)
 * @method static static TEMP_UNEMPLOYED(string $description = null)
 * @method static static PART_TIME_WORK(string $description = null)
 * @method static static STUDENT(string $description = null)
 * @method static static PENSIONER(string $description = null)
 * @method static static PENSIONER_WORK(string $description = null)
 * @method static static MATERNITY_LEAVE(string $description = null)
 * @method static static OTHER(string $description = null)
 */
final class SocialStatus extends Ubki\Reference
{
    const FULL_TIME_WORK = 1;
    const TERM_TIME_WORK = 2;
    const TEMP_UNEMPLOYED = 3;
    const PART_TIME_WORK = 4;
    const STUDENT = 5;
    const PENSIONER = 6;
    const PENSIONER_WORK= 7;
    const MATERNITY_LEAVE = 8;
    const OTHER = 9;
}
