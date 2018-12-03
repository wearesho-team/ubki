<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Dictionaries\LinkedIdentifierRole;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Interface LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface LinkedPerson extends ElementInterface
{
    public const TAG = 'linked';
    public const ERGPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ROLE_REF = 'linkroleref';
    public const ISSUE_DATE = 'rdate';

    public function getErgpou(): ?string;

    public function getName(): string;

    public function getRole(): LinkedIdentifierRole;

    public function getIssueDate(): \DateTimeInterface;
}
