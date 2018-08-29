<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Photo extends Element implements \JsonSerializable
{
    public const TAG = 'foto';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $photo;

    /** @var string|null */
    protected $inn;

    public function __construct(\DateTimeInterface $createdAt, string $photo, ?string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->photo = $photo;
        $this->inn = $inn;
    }


    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'inn' => $this->inn,
            'photo' => $this->photo
        ];
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
