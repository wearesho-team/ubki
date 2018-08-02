<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Photo;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Photo
 */
class Entity extends Ubki\Element implements \JsonSerializable
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

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->getCreatedAt())->toDateString(),
            'inn' => $this->getInn(),
            'photo' => base64_decode($this->getPhoto())
        ];
    }
}
