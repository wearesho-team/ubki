<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait Work
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Work
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var Dictionaries\IdentifierRank|null */
    protected $rank;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Work::CREATED_AT => $this->createdAt,
            Interfaces\Work::LANGUAGE => $this->language,
            Interfaces\Work::ERGPOU => $this->ergpou,
            Interfaces\Work::NAME => $this->name,
            Interfaces\Work::RANK => $this->rank,
            Interfaces\Work::EXPERIENCE => $this->experience,
            Interfaces\Work::INCOME => $this->income
        ];
    }

    public function tag(): string
    {
        return Interfaces\Work::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Dictionaries\Language
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

    public function getRank(): ?Dictionaries\IdentifierRank
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
