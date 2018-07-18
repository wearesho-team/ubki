<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Block
 */
class Step
{
    public const TAG = 'step';

    public const NAME = 'name';
    public const START_TIME = 'stm';
    public const END_TIME = 'ftm';

    /**
     * name attribute
     * @var string
     */
    protected $name;

    /**
     * stm attribute
     * format: Y-m-d H:i:s.u
     * @var \DateTimeInterface
     */
    protected $startTime;

    /**
     * stm attribute
     * format: Y-m-d H:i:s.u
     * @var \DateTimeInterface
     */
    protected $endTime;

    /**
     * Step constructor.
     *
     * @param string             $name
     * @param \DateTimeInterface $startTime
     * @param \DateTimeInterface $endTime
     */
    public function __construct(
        string $name,
        \DateTimeInterface $startTime,
        \DateTimeInterface $endTime
    ) {
        $this->name = $name;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartTime(): \DateTimeInterface
    {
        return $this->startTime;
    }

    public function getEndTime(): \DateTimeInterface
    {
        return $this->endTime;
    }
}
