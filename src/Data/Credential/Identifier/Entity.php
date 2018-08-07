<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read Ubki\Data\Language $language
 * @property-read string             $name
 */
abstract class Entity extends Ubki\Element implements \JsonSerializable
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const NAME = null;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Data\Language */
    protected $language;

    /** @var string */
    protected $name;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->name = $name;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'name' => $this->name,
        ];
    }
}
