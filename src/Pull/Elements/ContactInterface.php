<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Interface ContactInterface
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
interface ContactInterface
{
    public const TYPE = 'ctype';
    public const VALUE = 'cval';

    public function getValue(): string;

    public function getType(): Ubki\Dictionaries\ContactType;
}
