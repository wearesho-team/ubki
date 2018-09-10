<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Interface CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditRegister extends ElementInterface
{
    public const TAG = 'credres';
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

    public function getDecision(): Dictionaries\Decision;

    public function getReason(): Dictionaries\RequestReason;

    public function getOrganization(): ?string;
}
