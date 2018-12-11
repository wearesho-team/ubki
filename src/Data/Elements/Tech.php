<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Tech
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Tech extends Ubki\Infrastructure\Element
{
    public const TAG = 'tech';

    /** @var Ubki\Data\Collections\Trace|null */
    protected $trace;

    /** @var string|null */
    protected $id;

    /** @var Balance|null */
    protected $balance;

    public function __construct(Ubki\Data\Collections\Trace $trace, string $id, Balance $balance)
    {
        $this->trace = $trace;
        $this->id = $id;
        $this->balance = $balance;
    }

    public function getTrace(): Ubki\Data\Collections\Trace
    {
        return $this->trace;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBalance(): Balance
    {
        return $this->balance;
    }
}
