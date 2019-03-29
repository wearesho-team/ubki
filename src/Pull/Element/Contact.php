<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class Contact extends Ubki\Infrastructure\Element implements ContactInterface
{
    use ContactTrait;

    public const TAG = 'cont';

    public function __construct(Ubki\Dictionary\Contact $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
