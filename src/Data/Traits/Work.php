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

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var Ubki\Dictionary\IdentifierRank|null */
    protected $rank;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
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

    public function getRank(): ?Ubki\Dictionary\IdentifierRank
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

    /**
     * @inheritdoc
     */
    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\Work::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\Work::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\Work::RANK => $this->getRank(),
            Ubki\Data\Interfaces\Work::ERGPOU => $this->getErgpou(),
            Ubki\Data\Interfaces\Work::NAME => $this->getName(),
            Ubki\Data\Interfaces\Work::EXPERIENCE => $this->getExperience(),
            Ubki\Data\Interfaces\Work::INCOME => $this->getIncome(),
        ];
    }
}
