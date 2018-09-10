<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Dictionaries\LinkedIdentifierRole;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait LinkedPerson
{
    /** @var string */
    protected $name;

    /** @var LinkedIdentifierRole */
    protected $role;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var string|null */
    protected $ergpou;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\LinkedPerson::NAME => $this->name,
            Interfaces\LinkedPerson::ROLE => $this->role,
            Interfaces\LinkedPerson::ISSUE_DATE => $this->issueDate,
            Interfaces\LinkedPerson::ERGPOU => $this->ergpou
        ];
    }

    public function tag(): string
    {
        return Interfaces\LinkedPerson::TAG;
    }

    public function getErgpou(): ?string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): LinkedIdentifierRole
    {
        return $this->role;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }
}
