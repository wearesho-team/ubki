<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data\Rate;

/**
 * Interface Description
 * @package Wearesho\Bobra\Ubki\Contract\Data\Rate
 */
interface Description
{
    public const TAG = 'dinfo';

    public const CREDITS_COUNT = 'all';
    public const OPEN_CREDITS_COUNT = 'open';
    public const DESCRIPTION = 'opentext';
    public const CLOSED_CREDITS_COUNT = 'close';
    public const EXPIRES = 'expyear';
    public const MAX_OVERDUE = 'maxnowexp';
    public const UPDATED_AT = 'datelastupdate';

    public function getCreditsCount(): int;

    public function getOpenCreditsCount(): int;

    public function getOpenCreditsDescription(): string;

    public function getClosedCreditsCount(): int;

    public function getExpires(): string;

    public function getMaxOverdue(): string;

    public function getUpdatedAt(): \DateTimeInterface;
}
