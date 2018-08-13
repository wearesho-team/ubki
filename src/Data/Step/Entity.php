<?php

namespace Wearesho\Bobra\Ubki\Data\Step;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Step
 *
 * @property-read string $name
 * @property-read \DateTimeInterface $start
 * @property-read \DateTimeInterface $end
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const PARENT_TAG = 'trace';
    public const TAG = 'step';

    public const NAME = 'name';
    public const START = 'stm';
    public const END = 'ftm';

    public function __construct(
        string $name,
        \DateTimeInterface $start,
        \DateTimeInterface $end
    ) {
        if ($start >= $end) {
            throw new \InvalidArgumentException('End date must be greater than start date!');
        }

        parent::__construct([
            'name' => $name,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'start' => Carbon::instance($this->start)->toDateTimeString(),
            'end' => Carbon::instance($this->end)->toDateTimeString()
        ];
    }
}
