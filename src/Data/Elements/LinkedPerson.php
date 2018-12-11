<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class LinkedPerson extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\LinkedPerson
{
    use Ubki\Data\Traits\LinkedPerson;

    public const TAG = 'linked';

    public function __construct(
        string $name,
        Ubki\Dictionaries\LinkedIdentifierRole $role,
        \DateTimeInterface $issueDate,
        string $ergpou = null
    ) {
        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
        $this->ergpou = $ergpou;
    }
}
