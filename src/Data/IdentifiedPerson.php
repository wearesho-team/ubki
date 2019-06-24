<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class IdentifiedPerson extends Person implements Ubki\Contract\Data\IdentifiedPerson, \JsonSerializable
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionary\Language */
    protected $language;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;

        parent::__construct($name);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::make($this->createdAt),
            'language' => $this->language,
            'name' => $this->name,
        ];
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }
}
