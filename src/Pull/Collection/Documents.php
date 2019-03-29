<?php

namespace Wearesho\Bobra\Ubki\Pull\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Documents
 * @package Wearesho\Bobra\Ubki\Pull\Collection
 */
class Documents extends BaseCollection implements Ubki\Infrastructure\ElementInterface
{
    use Ubki\Infrastructure\ElementTrait;

    public const TAG = 'docs';

    public function type(): string
    {
        return Ubki\Pull\Element\DocumentInterface::class;
    }
}
