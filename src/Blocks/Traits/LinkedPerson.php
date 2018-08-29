<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;

/**
 * Trait LinkedPerson
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait LinkedPerson
{
    use ElementTrait;

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
            'name' => $this->name,
            'role' => (string)$this->role,
            'issueDate' => Carbon::instance($this->issueDate)->toDateString(),
            'ergpou' => $this->ergpou
        ];
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
