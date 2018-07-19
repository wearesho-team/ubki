<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class SocialStatus
 * @package Wearesho\Bobra\Ubki\Type
 */
final class SocialStatus extends Ubki\Reference
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

    public static function FULL_TIME(string $description = null): SocialStatus
    {
        return new SocialStatus(static::FULL_TIME, $description);
    }

    public static function TERM_TIME(string $description = null): SocialStatus
    {
        return new SocialStatus(static::TERM_TIME, $description);
    }

    public static function TEMP_UNEMPLOYED(string $description = null): SocialStatus
    {
        return new SocialStatus(static::TEMP_UNEMPLOYED, $description);
    }

    public static function PART_TIME(string $description = null): SocialStatus
    {
        return new SocialStatus(static::PART_TIME, $description);
    }

    public static function STUDENT(string $description = null): SocialStatus
    {
        return new SocialStatus(static::STUDENT, $description);
    }

    public static function PENSIONER(string $description = null): SocialStatus
    {
        return new SocialStatus(static::PENSIONER, $description);
    }

    public static function PENSIONER_WORK(string $description = null): SocialStatus
    {
        return new SocialStatus(static::PENSIONER_WORK, $description);
    }

    public static function MATERNITY_LEAVE(string $description = null): SocialStatus
    {
        return new SocialStatus(static::MATERNITY_LEAVE, $description);
    }

    public static function OTHER(string $description = null): SocialStatus
    {
        return new SocialStatus(static::OTHER, $description);
    }
}
