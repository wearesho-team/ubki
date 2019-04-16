<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Rate;

use Wearesho\Bobra\Ubki;

/**
 * Class Description
 * @package Wearesho\Bobra\Ubki\Data\Rate
 */
class Description implements Ubki\Contract\Data\Rate\Description
{
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

    /** @var \DateTimeInterface */
    protected $updatedAt;

    public function __construct(
        int $creditsCount,
        int $openCreditsCount,
        string $openCreditsDescription,
        int $closedCreditsCount,
        string $expires,
        string $maxOverdue,
        \DateTimeInterface $updatedAt
    ) {
        $this->creditsCount = $creditsCount;
        $this->openCreditsCount = $openCreditsCount;
        $this->openCreditsDescription = $openCreditsDescription;
        $this->closedCreditsCount = $closedCreditsCount;
        $this->expires = $expires;
        $this->maxOverdue = $maxOverdue;
        $this->updatedAt = $updatedAt;
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

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
