<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Photo;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Photo
 */
class Entity extends Ubki\Element
{
    public const TAG = 'foto';
    
    // attributes
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string|null */
    protected $inn;

    /** @var string */
    protected $photo;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $photo,
        ?string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->inn = $inn;
        $this->photo = $photo;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
}
