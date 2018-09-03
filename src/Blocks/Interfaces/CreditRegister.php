<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Interface CreditRegister
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface CreditRegister extends ElementInterface
{
    public const TAG = 'credres';
    public const DATE = 'redate';
    public const INN = 'inn';
    public const ID = 'reqid';
    public const DECISION = 'result';
    public const REASON = 'reqreason';
    public const ORGANIZATION = 'org';

    public function getDate(): \DateTimeInterface;

    public function getInn(): string;

    public function getId(): string;

    public function getDecision(): Decision;

    public function getReason(): int;

    public function getOrganization(): ?string;
}
