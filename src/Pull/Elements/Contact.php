<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
class Contact extends Ubki\Infrastructure\Element implements ContactInterface
{
    use ContactTrait;

    public const TAG = 'cont';

    public function __construct(Ubki\Dictionaries\ContactType $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
