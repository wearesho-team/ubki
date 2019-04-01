<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class Document
{
    public const TAG = 'doc';

    public const TYPE = 'dtype';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';

    /** @var Ubki\Dictionary\Document */
    protected $type;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    public function __construct(Ubki\Dictionary\Document $type, string $serial, string $number)
    {
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
    }

    public function getType(): Ubki\Dictionary\Document
    {
        return $this->type;
    }

    public function getSerial(): string
    {
        return $this->serial;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
