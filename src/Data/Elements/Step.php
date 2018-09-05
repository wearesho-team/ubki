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
    public const NAME = 'name';
    public const START = 'stm';
    public const END = 'ftm';
    
    /** @var string */
    protected $name;

    /** @var string|null */
    protected $start;

    /** @var string|null */
    protected $end;

    public function __construct(string $name, ?string $start = null, ?string $end = null)
    {
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    public function jsonSerialize(): array
    {
        return [
            static::NAME => $this->name,
            static::START => $this->start,
            static::END => $this->end,
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStart(): string
    {
        return $this->start;
    }

    public function getEnd(): string
    {
        return $this->end;
    }
}
