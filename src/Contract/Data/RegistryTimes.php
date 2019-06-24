<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface RegistryTimes
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface RegistryTimes
{
    public const BY_HOUR = 'hr';
    public const BY_DAY = 'da';
    public const BY_WEEK = 'wk';
    public const BY_MONTH = 'mn';
    public const BY_QUARTER = 'qw';
    public const BY_YEAR = 'ye';
    public const BY_MORE_YEAR = 'yu';

    public function getByHour(): int;

    public function getByDay(): int;

    public function getByWeek(): int;

    public function getByMonth(): int;

    public function getByQuarter(): int;

    public function getByYear(): int;

    public function getByMoreYear(): int;
}
