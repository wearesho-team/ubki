<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Step implements ElementInterface
{
    use ElementTrait;
    
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
            'name' => $this->name,
            'start' => $this->start,
            'end' => $this->end,
        ];
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
