<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Trait Photo
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait Photo
{
    use ElementTrait;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $uri;

    /** @var string|null */
    protected $inn;

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'inn' => $this->inn,
            'photo' => $this->uri
        ];
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
