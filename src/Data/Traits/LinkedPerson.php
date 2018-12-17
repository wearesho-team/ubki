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

    /** @var Ubki\Dictionary\LinkedIdentifierRole */
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

    public function getRole(): Ubki\Dictionary\LinkedIdentifierRole
    {
        return $this->role;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @inheritdoc
     */
    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\LinkedPerson::NAME => $this->getName(),
            Ubki\Data\Interfaces\LinkedPerson::ERGPOU => $this->getErgpou(),
            Ubki\Data\Interfaces\LinkedPerson::ISSUE_DATE => $this->getIssueDate(),
            Ubki\Data\Interfaces\LinkedPerson::ROLE => $this->getRole(),
        ];
    }
}
