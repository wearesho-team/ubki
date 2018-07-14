<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Balance
 * <billing><balance /><billing/> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Balance
{
    public const TAG = 'balance';

    public const VALUE = 'value';
    public const DATE = 'date';
    public const TIME = 'time';

    /**
     * value attribute
     * @var float
     */
    protected $value;

    /**
     * date attribute
     * @var \DateTimeInterface
     */
    protected $date;

    /**
     * time attribute
     * @var \DateTimeInterface
     */
    protected $time;

    /**
     * Balance constructor.
     *
     * @param float              $value
     * @param \DateTimeInterface $date
     * @param \DateTimeInterface $time
     */
    public function __construct(
        float $value,
        \DateTimeInterface $date,
        \DateTimeInterface $time
    ) {
        $this->value = $value;
        $this->date = $date;
        $this->time = $time;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getTime(): \DateTimeInterface
    {
        return $this->time;
    }
}
