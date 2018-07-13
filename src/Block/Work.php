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

    // region attributes
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const RANK = 'cdolgn';
    public const ERGPOU = 'wokpo';
    public const WORKPLACE_NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';
    // endregion

    /**
     * Created date of this work
     * vdate attribute
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Language of this block
     * lng attribute
     * @var int
     */
    protected $language;

    /**
     * Official position at work
     * cdolgn attribute
     * @var int
     */
    protected $rank;

    /**
     * Place of work from the Unified State Register of Enterprises and Organizations of Ukraine
     * wokpo attribute
     * @var int
     */
    protected $wokpo;

    /**
     * Name of subject's workplace
     * wname attribute
     * @var string
     */
    protected $workName;

    /**
     * Experience of subject on this workplace
     * wstag attribute
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

    ) {
    }
}
