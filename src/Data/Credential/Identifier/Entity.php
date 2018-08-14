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
    public const LANGUAGE_REF = 'lngref';
    public const NAME = null;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        string $name,
        array $properties
    ) {
        parent::__construct(array_merge([
            'createdAt' => $createdAt,
            'language' => $language,
            'name' => $name,
        ], $properties));
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'name' => $this->name,
        ];
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Data\Language
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
