<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const TAG = 'linked';

    // attributes
    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ISSUE_DATE = 'rdate';
    
    /** @var string|null */
    protected $ergpou;

    /** @var string */
    protected $name;

    /** @var Role */
    protected $role;
    
    /** @var \DateTimeInterface */
    protected $issueDate;

    public function __construct(
        string $name,
        Role $role,
        \DateTimeInterface $issueDate,
        ?string $ergpou = null
    ) {
        $this->ergpou = $ergpou;
        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
    }

    public function getErgpou(): ?string
    {
        return $this->ergpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->getName(),
            'role' => (string)$this->getRole(),
            'issueDate' => Carbon::instance($this->getIssueDate())->toDateString(),
            'ergpou' => $this->getErgpou()
        ];
    }
}
