<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data
 */
class LinkedPerson
{
    public const TAG = 'linked';

    public const EGRPOU = 'okpo2';
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
    protected $egrpou;

    public function __construct(
        string $name,
        Ubki\Dictionary\LinkedIdentifierRole $role,
        \DateTimeInterface $issueDate,
        string $egrpou = null
    ) {
        Ubki\Validator::OKPO_UNICODE()->validate($egrpou, true);
        Ubki\Validator::JUST_TEXT_250()->validate($name);

        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
        $this->egrpou = $egrpou;
    }

    public function getEgrpou(): ?string
    {
        return $this->egrpou;
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
