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
    protected $photo;

    /** @var string|null */
    protected $inn;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Photo::CREATED_AT => Carbon::instance($this->createdAt)->toDateString(),
            Interfaces\Photo::INN => $this->inn,
            Interfaces\Photo::PHOTO => $this->photo
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

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
