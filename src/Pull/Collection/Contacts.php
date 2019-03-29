<?php

namespace Wearesho\Bobra\Ubki\Pull\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Collection
 */
class Contacts extends BaseCollection implements Ubki\ElementInterface
{
    use Ubki\ElementTrait;

    public const TAG = 'contacts';

    public function type(): string
    {
        return Ubki\Pull\Element\ContactInterface::class;
    }
}
