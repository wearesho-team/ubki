<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Work extends Element
{
    public const TAG = 'work';
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const RANK = 'cdolgn';
    public const RANK_REF = 'cdolgnref';
    public const ERGPOU = 'wokpo';
    public const NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var References\Language */
    protected $language;

    /** @var string */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var References\IdentifierRank|null */
    protected $rank;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $ergpou,
        string $name,
        ?References\IdentifierRank $rank = null,
        ?int $experience = null,
        ?float $income = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->ergpou = $ergpou;
        $this->name = $name;
        $this->rank = $rank;
        $this->experience = $experience;
        $this->income = $income;
    }


    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'ergpou' => $this->ergpou,
            'name' => $this->name,
            'rank' => (string)$this->rank,
            'experience' => $this->experience,
            'income' => $this->income
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

    public function getErgpou(): string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRank(): ?References\IdentifierRank
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
