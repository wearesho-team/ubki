<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class LinkedPerson extends Element implements \JsonSerializable
{
    public const TAG = 'linked';
    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ROLE_REF = 'linkroleref';
    public const ISSUE_DATE = 'rdate';

    /** @var string */
    protected $name;

    /** @var LinkedIdentifierRole */
    protected $role;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var string|null */
    protected $ergpou;

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
