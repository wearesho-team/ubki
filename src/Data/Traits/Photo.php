<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait Photo
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Photo
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $uri;

    /** @var string|null */
    protected $inn;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Photo::CREATED_AT => Carbon::instance($this->createdAt)->toDateString(),
            Interfaces\Photo::INN => $this->inn,
            Interfaces\Photo::PHOTO => $this->uri
        ];
    }

    public function tag(): string
    {
        return Interfaces\Photo::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
