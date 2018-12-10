<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Step extends Infrastructure\Element
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

    public function tag(): string
    {
        return static::TAG;
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
