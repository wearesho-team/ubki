<?php

namespace Wearesho\Bobra\Ubki\Data\Step;

use Carbon\Carbon;
use function GuzzleHttp\Psr7\_caseless_remove;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Step
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const PARENT_TAG = 'trace';
    public const TAG = 'step';

    public const NAME = 'name';
    public const START = 'stm';
    public const END = 'ftm';

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
        if ($start >= $end) {
            throw new \InvalidArgumentException('End date must be greater than start date!');
        }

        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
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

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->getName(),
            'start' => Carbon::instance($this->getStart())->toDateTimeString(),
            'end' => Carbon::instance($this->getEnd())->toDateTimeString()
        ];
    }
}
