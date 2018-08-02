<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier
 */
abstract class Entity extends Ubki\Element implements Person, \JsonSerializable
{
    // attributes
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

    public function jsonSerialize(): array
    {
        $language = $this->getLanguage();

        return [
            'createdAt' => Carbon::instance($this->getCreatedAt())->toDateString(),
            'language' => $language->getDescription() ?? $language->getKey(),
            'name' => $this->getName(),
        ];
    }
}
