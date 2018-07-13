<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Work
 * Data about subject's work
 * <work> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Work
{
    public const TAG = 'work';

    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const RANK = 'cdolgn';
    public const ERGPOU = 'wokpo';
    public const WORKPLACE_NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    /**
     * Created date of this work
     * vdate attribute (required)
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Language of this block
     * lng attribute (required)
     * @var int
     */
    protected $language;

    /**
     * Official position at work
     * cdolgn attribute (not required)
     * @var int
     */
    protected $rank;

    /**
     * Place of work from the Unified State Register of Enterprises and Organizations of Ukraine
     * wokpo attribute (required)
     * @var int
     */
    protected $wokpo;

    /**
     * Name of subject's workplace
     * wname attribute (required)
     * @var string
     */
    protected $workName;

    /**
     * Experience of subject on this workplace
     * wstag attribute (not required)
     * @var int
     */
    protected $experience;

    /**
     * Monthly customer income
     * wdohod attribute
     * @var float
     */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        int $wokpo,
        string $workName,
        int $rank = null,
        int $experience = null,
        float $income = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->wokpo = $wokpo;
        $this->workName = $workName;
        $this->rank = $rank;
        $this->experience = $experience;
        $this->income = $income;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getRank(): int
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

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getIncome(): float
    {
        return $this->income;
    }
}
