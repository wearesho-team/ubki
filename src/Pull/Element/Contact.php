<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class Contact extends Ubki\Element
{
    public const TAG = 'cont';

    public const TYPE = 'ctype';
    public const VALUE = 'cval';

    /** @var Ubki\Dictionary\Contact */
    protected $type;

    /** @var string */
    protected $value;

    public function __construct(Ubki\Dictionary\Contact $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionary\Contact
    {
        return $this->type;
    }
}
