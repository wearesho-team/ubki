<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface LinkedPerson
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface LinkedPerson
{
    public const EGRPOU = 'okpo2';
    public const NAME = 'okpo2_name';
    public const ROLE = 'linkrole';
    public const ROLE_REF = 'linkroleref';
    public const ISSUE_DATE = 'rdate';

    public function getEgrpou(): ?string;

    public function getName(): string;

    public function getRole(): Ubki\Dictionary\LinkedIdentifierRole;

    public function getIssueDate(): \DateTimeInterface;
}
