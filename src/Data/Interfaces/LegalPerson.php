<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Interface LegalPerson
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface LegalPerson extends IdentifiedPerson
{
    public const LEGAL_PREFIX = 'ur';
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

    public function getErgpou(): ?string;

    public function getForm(): ?int;

    public function getEconomyBranch(): ?string;

    public function getEdrRegistrationDate(): ?\DateTimeInterface;

    public function getTaxRegistrationDate(): ?\DateTimeInterface;
}
