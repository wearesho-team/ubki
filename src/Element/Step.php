<?php

namespace Wearesho\Bobra\Ubki\Element;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Element
 */
class Step extends Ubki\Element
{
    /** @var string */
    protected $name;

    /** @var \DateTimeInterface */
    protected $start;

    /** @var \DateTimeInterface */
    protected $end;

    public function __construct(
        string $name,
        \DateTimeInterface $start,
        \DateTimeInterface $end
    ) {
        if (Carbon::parse($start)->greaterThanOrEqualTo(Carbon::parse($end))) {
            throw new \InvalidArgumentException('End date must be greater than start date!');
        }

        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    public function tag(): string
    {
        return 'step';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }
}
