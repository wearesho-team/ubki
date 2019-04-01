<?php

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data
 */
class Photo
{
    public const TAG = 'foto';

    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $uri;

    /** @var string|null */
    protected $inn;

    public function __construct(\DateTimeInterface $createdAt, string $uri, string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
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
