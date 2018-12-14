<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Interface DocumentInterface
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
interface DocumentInterface extends Ubki\Infrastructure\ElementInterface
{
    public const TYPE = 'dtype';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';

    public function getType(): Ubki\Dictionaries\DocumentType;

    public function getSerial(): string;

    public function getNumber(): string;
}
