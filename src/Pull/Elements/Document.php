<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
class Document extends Ubki\Infrastructure\Element implements DocumentInterface
{
    use DocumentTrait;

    public const TAG = 'doc';

    public function __construct(Ubki\Dictionaries\DocumentType $type, string $serial, string $number)
    {
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
    }
}
