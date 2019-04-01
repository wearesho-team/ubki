<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data
 */
class Work extends Ubki\Element
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

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $ergpou,
        string $name,
        Ubki\Dictionary\IdentifierRank $rank = null,
        int $experience = null,
        float $income = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->ergpou = $ergpou;
        $this->name = $name;
        $this->rank = $rank;
        $this->experience = $experience;
        $this->income = $income;
    }

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
}
