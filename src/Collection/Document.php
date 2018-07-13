<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Collection
 */
class Document extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\Document::class;
    }
}
