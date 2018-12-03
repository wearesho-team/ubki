<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class RatingDescription
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RatingDescription extends Element
{
    public const TAG = 'dinfo';
    public const CREDITS_COUNT = 'all';
    public const OPEN_CREDITS_COUNT = 'open';
    public const DESCRIPTION = 'opentext';
    public const CLOSED_CREDITS_COUNT = 'close';
    public const EXPIRES = 'expyear';
    public const MAX_OVERDUE = 'maxnowexp';
    public const UPDATED_AT = 'datelastupdate';

    /** @var int */
    protected $creditsCount;

    /** @var int */
    protected $openCreditsCount;

    /** @var string */
    protected $openCreditsDescription;

    /** @var int */
    protected $closedCreditsCount;

    /** @var string */
    protected $expires;

    /** @var string */
    protected $maxOverdue;

    /** @var Carbon */
    protected $updatedAt;

    public function __construct(
        int $creditsCount,
        int $openCreditsCount,
        string $openCreditsDescription,
        int $closedCreditsCount,
        string $expires,
        string $maxOverdue,
        Carbon $updatedAt
    ) {
        $this->creditsCount = $creditsCount;
        $this->openCreditsCount = $openCreditsCount;
        $this->openCreditsDescription = $openCreditsDescription;
        $this->closedCreditsCount = $closedCreditsCount;
        $this->expires = $expires;
        $this->maxOverdue = $maxOverdue;
        $this->updatedAt = $updatedAt;
    }

    public function jsonSerialize(): array
    {
        return [
            static::CREDITS_COUNT => $this->creditsCount,
            static::OPEN_CREDITS_COUNT => $this->openCreditsCount,
            static::DESCRIPTION => $this->openCreditsDescription,
            static::CLOSED_CREDITS_COUNT => $this->closedCreditsCount,
            static::EXPIRES => $this->expires,
            static::MAX_OVERDUE => $this->maxOverdue,
            static::UPDATED_AT => $this->updatedAt
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getCreditsCount(): int
    {
        return $this->creditsCount;
    }

    public function getOpenCreditsCount(): int
    {
        return $this->openCreditsCount;
    }

    public function getOpenCreditsDescription(): string
    {
        return $this->openCreditsDescription;
    }

    public function getClosedCreditsCount(): int
    {
        return $this->closedCreditsCount;
    }

    public function getExpires(): string
    {
        return $this->expires;
    }

    public function getMaxOverdue(): string
    {
        return $this->maxOverdue;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
