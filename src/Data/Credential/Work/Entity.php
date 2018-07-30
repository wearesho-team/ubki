<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Work;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Work
 */
class Entity extends Element
{
    public const TAG = 'work';

    // attributes
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const RANK = 'cdolgn';
    public const ERGPOU = 'wokpo';
    public const NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';
    
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Data\Language */
    protected $language;

    /** @var Rank|null */
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
        Data\Language $language,
        string $ergpou,
        string $name,
        ?Rank $rank = null,
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Data\Language
    {
        return $this->language;
    }

    public function getRank(): ?Rank
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
