<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait LinkedPerson
{
    /** @var string */
    protected $name;

    /** @var Ubki\Dictionaries\LinkedIdentifierRole */
    protected $role;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var string|null */
    protected $ergpou;

    public function getErgpou(): ?string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): Ubki\Dictionaries\LinkedIdentifierRole
    {
        return $this->role;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }
}
