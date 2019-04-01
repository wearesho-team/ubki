<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data
 */
class LinkedPerson extends Ubki\Element
{
    public const TAG = 'linked';

    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ROLE_REF = 'linkroleref';
    public const ISSUE_DATE = 'rdate';

    /** @var string */
    protected $name;

    /** @var Ubki\Dictionary\LinkedIdentifierRole */
    protected $role;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var string|null */
    protected $ergpou;

    public function __construct(
        string $name,
        Ubki\Dictionary\LinkedIdentifierRole $role,
        \DateTimeInterface $issueDate,
        string $ergpou = null
    ) {
        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
        $this->ergpou = $ergpou;
    }

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
}
