<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Data
 */
class Step extends Ubki\Element
{
    public const TAG = 'step';

    /** @var string|null */
    protected $name;

    /** @var \DateTimeInterface|null */
    protected $start;

    /** @var \DateTimeInterface|null */
    protected $end;

    public function __construct(?string $name, ?\DateTimeInterface $start, ?\DateTimeInterface $end)
    {
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }
}
