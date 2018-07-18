<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Block
 */
class Work extends BaseBlock
{
    // attributes
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const RANK = 'cdolgn';
    public const ERGPOU = 'wokpo';
    public const WORKPLACE_NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var int */
    protected $language;

    /** @var int|null */
    protected $rank;

    /**
     * Place of work from the Unified State Register of Enterprises and Organizations of Ukraine
     * @var int
     */
    protected $wokpo;

    /** @var string */
    protected $workName;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        int $wokpo,
        string $workName,
        ?int $rank = null,
        ?int $experience = null,
        ?float $income = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->wokpo = $wokpo;
        $this->workName = $workName;
        $this->rank = $rank;
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

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function getWokpo(): int
    {
        return $this->wokpo;
    }

    public function getWorkName(): string
    {
        return $this->workName;
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
