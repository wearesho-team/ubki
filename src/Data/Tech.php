<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Tech
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Tech make(...$arguments)
 */
class Tech implements Ubki\Contract\Data\Tech, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var Ubki\Data\Collection\Trace|null */
    protected $trace;

    /** @var string|null */
    protected $id;

    /** @var Ubki\Contract\Data\Balance|null */
    protected $balance;

    public function __construct(Ubki\Data\Collection\Trace $trace, string $id, Ubki\Contract\Data\Balance $balance)
    {
        $this->trace = $trace;
        $this->id = $id;
        $this->balance = $balance;
    }

    public function jsonSerialize(): array
    {
        return [
            'trace' => $this->trace,
            'id' => $this->id,
            'balance' => $this->balance,
        ];
    }

    public static function tag(): string
    {
        return 'tech';
    }

    public function getTrace(): Ubki\Data\Collection\Trace
    {
        return $this->trace;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBalance(): Ubki\Contract\Data\Balance
    {
        return $this->balance;
    }
}
