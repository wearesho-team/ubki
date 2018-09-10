<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries\LinkedIdentifierRole;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class LinkedPerson extends Element implements Data\Interfaces\LinkedPerson
{
    use Data\Traits\LinkedPerson;

    public function __construct(
        string $name,
        LinkedIdentifierRole $role,
        \DateTimeInterface $issueDate,
        ?string $ergpou = null
    ) {
        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
        $this->ergpou = $ergpou;
    }
}
