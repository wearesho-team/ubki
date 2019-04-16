<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface LegalPerson
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface LegalPerson
{
    public const ERGPOU = 'okpo';
    public const NAME = 'urname';
    public const FORM = 'urfrms';
    public const FORM_REF = 'urfrmsref';
    public const ECONOMY_BRANCH = 'ureconom';
    public const ECONOMY_BRANCH_REF = 'ureconomref';
    public const ACTIVITY_TYPE = 'urvide';
    public const ACTIVITY_TYPE_REF = 'urvideref';
    public const EDR_REGISTRATION_DATE = 'urdatreg';
    public const TAX_REGISTRATION_DATE = 'urdatregnal';

    public function getActivityType(): ?string;

    public function getEgrpou(): ?string;

    public function getOwnership(): ?Ubki\Dictionary\Ownership;

    public function getEconomyBranch(): ?Ubki\Dictionary\EconomyBranch;

    public function getEdrRegistrationDate(): ?\DateTimeInterface;

    public function getTaxRegistrationDate(): ?\DateTimeInterface;
}
