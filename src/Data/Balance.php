<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Balance
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Balance make(...$arguments)
 */
class Balance implements Ubki\Contract\Data\Balance, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var float */
    protected $value;

    /** @var \DateTimeInterface|null */
    protected $date;

    public function __construct(float $value, ?\DateTimeInterface $date)
    {
        $this->value = $value;
        $this->date = $date;
    }

    public function jsonSerialize(): array
    {
        return [
            'value' => $this->value,
            'date' => Carbon::make($this->date),
        ];
    }

    public static function tag(): string
    {
        return 'balance';
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
}
