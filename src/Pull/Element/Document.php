<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class Document extends Ubki\Element implements DocumentInterface
{
    use DocumentTrait;

    public const TAG = 'doc';

    public function __construct(Ubki\Dictionary\Document $type, string $serial, string $number)
    {
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
    }
}
