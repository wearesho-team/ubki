<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Tech
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class Tech extends Ubki\Element
{
    public const TAG = 'tech';

    /** @var Ubki\Data\Collection\Trace|null */
    protected $trace;

    /** @var string|null */
    protected $id;

    /** @var Balance|null */
    protected $balance;

    public function __construct(Ubki\Data\Collection\Trace $trace, string $id, Balance $balance)
    {
        $this->trace = $trace;
        $this->id = $id;
        $this->balance = $balance;
    }

    public function getTrace(): Ubki\Data\Collection\Trace
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
