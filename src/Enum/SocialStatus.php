<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SocialStatus
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SocialStatus FULL_TIME()
 * @method static SocialStatus TERM_TIME()
 * @method static SocialStatus TEMP_UNEMPLOYED()
 * @method static SocialStatus PART_TIME()
 * @method static SocialStatus STUDENT()
 * @method static SocialStatus PENSIONER()
 * @method static SocialStatus PENSIONER_WORK()
 * @method static SocialStatus MATERNITY_LEAVE()
 * @method static SocialStatus OTHER()
 */
final class SocialStatus extends Enum
{
    const FULL_TIME = 1;
    const TERM_TIME = 2;
    const TEMP_UNEMPLOYED = 3;
    const PART_TIME = 4;
    const STUDENT = 5;
    const PENSIONER = 6;
    const PENSIONER_WORK = 7;
    const MATERNITY_LEAVE = 8;
    const OTHER = 9;
}
