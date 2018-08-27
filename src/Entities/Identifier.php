<?php

namespace Wearesho\Bobra\Ubki\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Identifier
 * @package Wearesho\Bobra\Ubki\Entities
 */
abstract class Identifier extends Element implements \JsonSerializable
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const NAME = null;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var References\Language */
    protected $language;

    /** @var string */
    protected $name;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): References\Language
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
