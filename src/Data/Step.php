<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Step
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Step make(...$arguments)
 */
class Step implements Ubki\Contract\Data\Step, \JsonSerializable
{
    use Makeable, Tagable;

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

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'start' => Carbon::make($this->start),
            'end' => Carbon::make($this->end),
        ];
    }

    public static function tag(): string
    {
        return 'step';
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
