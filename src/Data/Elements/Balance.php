<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Balance
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Balance extends Infrastructure\Element
{
    public const TAG = 'balance';

    /** @var float */
    protected $value;

    /** @var \DateTimeInterface|null */
    protected $date;

    /** @var string|null */
    protected $time;

    public function __construct(float $value, ?\DateTimeInterface $date, ?string $time)
    {
        $this->value = $value;
        $this->date = $date;
        $this->time = $time;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }
}
