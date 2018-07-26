<?php

namespace Wearesho\Bobra\Ubki\Data\Work;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Work
 */
class Entity extends Ubki\Element
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Data\Language */
    protected $language;

    /** @var int */
    protected $rank;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var int */
    protected $experience;

    /** @var float */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        int $rank,
        string $ergpou,
        string $name,
        int $experience,
        float $income
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->rank = $rank;
        $this->ergpou = $ergpou;
        $this->name = $name;
        $this->experience = $experience;
        $this->income = $income;
    }

    public function tag(): string
    {
        return 'work';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Data\Language
    {
        return $this->language;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getErgpou(): string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getIncome(): float
    {
        return $this->income;
    }
}
