<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Photo;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Photo
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read string             $inn
 * @property-read string             $photo
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'foto';

    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    public function __construct(
        \DateTimeInterface $createdAt,
        string $photo,
        ?string $inn = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'photo' => $photo,
            'inn' => $inn
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'inn' => $this->inn,
            'photo' => $this->photo
        ];
    }
}
