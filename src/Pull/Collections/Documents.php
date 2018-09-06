<?php

namespace Wearesho\Bobra\Ubki\Pull\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Pull\Elements\Document;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Pull\Collections
 */
class Documents extends BaseCollection implements ElementInterface
{
    public const TAG = 'docs';
    
    public function type(): string
    {
        return Document::class;
    }

    public function tag(): string
    {
        return static::TAG;
    }
}
