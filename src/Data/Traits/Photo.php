<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

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

    /**
     * @inheritdoc
     */
    public function associativeAttributes(): array
    {
        return [
            Interfaces\Photo::CREATED_AT => $this->getCreatedAt(),
            Interfaces\Photo::INN => $this->getInn(),
            Interfaces\Photo::PHOTO => $this->getUri(),
        ];
    }
}
