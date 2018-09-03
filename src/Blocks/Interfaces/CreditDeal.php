<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Interface CreditDeal
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface CreditDeal extends ElementInterface
{
    public const TAG = 'crdeal';
    public const ID = 'dlref';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const INN = 'inn';
    public const LAST_NAME = 'lname';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
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

    public function getLanguage(): References\Language;

    public function getName(): string;

    public function getSurname(): string;

    public function getBirthDate(): \DateTimeInterface;

    public function getType(): References\CreditDealType;

    public function getCollateral(): References\CollateralType;

    public function getRepaymentProcedure(): References\RepaymentProcedure;

    public function getCurrency(): References\Currency;

    public function getInitialAmount(): float;

    public function getSubjectRole(): References\SubjectRole;

    public function getCollateralCost(): float;

    public function getDealLifeCollection(): Blocks\Collections\DealLifes;

    public function getInn(): ?string;

    public function getPatronymic(): ?string;

    public function getSource(): ?string;
}
