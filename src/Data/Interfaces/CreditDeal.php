<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;

/**
 * Interface CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditDeal extends Element
{
    public const TAG = 'crdeal';
    public const ID = 'dlfer';
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

    public function getLanguage(): Dictionaries\Language;

    public function getName(): string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getType(): Dictionaries\CreditDealType;

    public function getCollateral(): Dictionaries\CollateralType;

    public function getRepaymentProcedure(): Dictionaries\RepaymentProcedure;

    public function getCurrency(): Dictionaries\Currency;

    public function getInitialAmount(): float;

    public function getSubjectRole(): Dictionaries\SubjectRole;

    public function getCollateralCost(): float;

    public function getDealLifeCollection(): Data\Collections\DealLifes;

    public function getInn(): ?string;

    public function getPatronymic(): ?string;

    public function getSource(): ?string;
}
