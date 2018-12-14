<?php

namespace Wearesho\Bobra\Ubki\Pull\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Pull\Collections
 */
class Documents extends BaseCollection implements Ubki\Infrastructure\ElementInterface
{
    use Ubki\Infrastructure\ElementTrait;

    public const TAG = 'docs';

    public function type(): string
    {
        return Ubki\Pull\Elements\DocumentInterface::class;
    }
}
