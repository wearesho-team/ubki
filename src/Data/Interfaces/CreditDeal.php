<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditDeal extends Ubki\ElementInterface
{
    public const ID = 'dlref';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const INN = 'inn';
    public const SURNAME = 'lname';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const BIRTH_DATE = 'bdate';
    public const TYPE = 'dlcelcred';
    public const TYPE_REF = 'dlcelcredref';
    public const COLLATERAL = 'dlvidobes';
    public const COLLATERAL_REF = 'dlvidobesref';
    public const REPAYMENT_PROCEDURE = 'dlporpog';
    public const REPAYMENT_PROCEDURE_REF = 'dlporpogref';
    public const CURRENCY = 'dlcurr';
    public const CURRENCY_REF = 'dlcurrref';
    public const INITIAL_AMOUNT = 'dlamt';
    public const SOURCE = 'dldonor';
    public const SUBJECT_ROLE = 'dlrolesub';
    public const SUBJECT_ROLE_REF = 'dlrolesubref';
    public const COLLATERAL_COST = 'dlamtobes';

    public function getId(): string;

    public function getLanguage(): Ubki\Dictionary\Language;

    public function getName(): string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getType(): Ubki\Dictionary\CreditDeal;

    public function getCollateral(): Ubki\Dictionary\Collateral;

    public function getRepaymentProcedure(): Ubki\Dictionary\RepaymentProcedure;

    public function getCurrency(): Ubki\Dictionary\Currency;

    public function getInitialAmount(): float;

    public function getSubjectRole(): Ubki\Dictionary\SubjectRole;

    public function getCollateralCost(): float;

    public function getDealLifes(): Ubki\Data\Collection\DealLifes;

    public function getInn(): ?string;

    public function getPatronymic(): ?string;

    public function getSource(): ?string;
}
