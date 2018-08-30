<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;

/**
 * Interface LinkedPerson
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
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
