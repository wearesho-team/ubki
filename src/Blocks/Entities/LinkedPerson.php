<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class LinkedPerson implements Blocks\Interfaces\LinkedPerson
{
    use Blocks\Traits\LinkedPerson;

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
