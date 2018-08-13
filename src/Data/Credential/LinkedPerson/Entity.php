<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\LinkedPerson
 *
 * @property-read string|null $ergpou
 * @property-read string $name
 * @property-read Role $role
 * @property-read \DateTimeInterface $issueDate
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'linked';

    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ISSUE_DATE = 'rdate';

    public function __construct(
        string $name,
        Role $role,
        \DateTimeInterface $issueDate,
        ?string $ergpou = null
    ) {
        parent::__construct([
            'ergpou' => $ergpou,
            'name' => $name,
            'role' => $role,
            'issueDate' => $issueDate
        ]);
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
}
