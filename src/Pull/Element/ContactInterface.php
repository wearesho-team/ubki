<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Interface ContactInterface
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
interface ContactInterface
{
    public const TYPE = 'ctype';
    public const VALUE = 'cval';

    public function getValue(): string;

    public function getType(): Ubki\Dictionary\Contact;
}
