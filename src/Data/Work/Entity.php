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

    /** @var Ubki\Data\Work\Rank|null */
    protected $rank;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        string $ergpou,
        string $name,
        ?Ubki\Data\Work\Rank $rank = null,
        ?int $experience = null,
        ?float $income = null
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

    public function getRank(): ?Ubki\Data\Work\Rank
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

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function getIncome(): ?float
    {
        return $this->income;
    }
}
