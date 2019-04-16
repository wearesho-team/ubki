<?php

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface CreditRequest
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface CreditRequest
{
    public const DATE = 'redate';
    public const INN = 'inn';
    public const ID = 'reqid';
    public const DECISION = 'result';
    public const DECISION_REF = 'resultref';
    public const REASON = 'reqreason';
    public const ORGANIZATION = 'org';

    public function getDate(): \DateTimeInterface;

    public function getInn(): string;

    public function getId(): string;

    public function getDecision(): Ubki\Dictionary\Decision;

    public function getReason(): Ubki\Dictionary\RequestReason;

    public function getOrganization(): ?string;
}
