<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Pull\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Pull\Collection
 */
class Document extends BaseCollection
{
    public const TAG = 'docs';

    final public function type(): string
    {
        return Ubki\Pull\Element\Document::class;
    }
}
