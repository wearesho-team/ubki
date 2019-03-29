<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class Identification extends Ubki\Element implements IdentificationInterface
{
    use IdentificationTrait;

    public const TAG = 'ident';

    public function __construct(
        string $inn,
        string $name = null,
        string $patronymic = null,
        string $surname = null,
        \DateTimeInterface $birthDate = null
    ) {
        $this->inn = $inn;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
    }
}
