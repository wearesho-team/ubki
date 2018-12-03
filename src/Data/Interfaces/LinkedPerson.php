<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface LinkedPerson extends Ubki\Infrastructure\ElementInterface
{
    public const TAG = 'linked';
    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ROLE_REF = 'linkroleref';
    public const ISSUE_DATE = 'rdate';

    public function getErgpou(): ?string;

    public function getName(): string;

    public function getRole(): Ubki\Dictionaries\LinkedIdentifierRole;

    public function getIssueDate(): \DateTimeInterface;
}
