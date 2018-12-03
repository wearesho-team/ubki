<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Work
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Work
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var Ubki\Dictionaries\IdentifierRank|null */
    protected $rank;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\Work::CREATED_AT => $this->createdAt,
            Ubki\Data\Interfaces\Work::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\Work::ERGPOU => $this->ergpou,
            Ubki\Data\Interfaces\Work::NAME => $this->name,
            Ubki\Data\Interfaces\Work::RANK => $this->rank,
            Ubki\Data\Interfaces\Work::EXPERIENCE => $this->experience,
            Ubki\Data\Interfaces\Work::INCOME => $this->income
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\Work::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
    {
        return $this->language;
    }

    public function getErgpou(): string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRank(): ?Ubki\Dictionaries\IdentifierRank
    {
        return $this->rank;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function getIncome(): ?float
    {
        return $this->income;
    }
}
