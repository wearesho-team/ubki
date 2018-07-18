<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Block
 */
class Step extends BaseBlock
{
    // attributes
    public const NAME = 'name';
    public const START_TIME = 'stm';
    public const END_TIME = 'ftm';

    /** @var string */
    protected $name;

    /** @var \DateTimeInterface */
    protected $startTime;

    /** @var \DateTimeInterface */
    protected $endTime;

    public function __construct(
        string $name,
        \DateTimeInterface $startTime,
        \DateTimeInterface $endTime
    ) {
        $this->name = $name;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function tag(): string
    {
        return 'step';
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
