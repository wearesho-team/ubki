<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Interface RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface RegistryTimes extends Element
{
    public const TAG = 'reestrtime';
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
