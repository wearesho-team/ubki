<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal
 *
 * @property-read string              $id
 * @property-read Data\Language       $language
 * @property-read string|null         $inn
 * @property-read string              $name
 * @property-read string|null         $patronymic
 * @property-read string              $surname
 * @property-read \DateTimeInterface  $birthDate
 * @property-read Type                $type
 * @property-read Collateral          $collateral
 * @property-read RepaymentProcedure  $repaymentProcedure
 * @property-read Data\Currency       $currency
 * @property-read float               $initialAmount
 * @property-read Data\SubjectRole    $subjectRole
 * @property-read float               $collateralCost
 * @property-read DealLife\Collection $dealLifes
 * @property-read string|null         $source
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'crdeal';

    public const ID = 'dlfer';
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

    public function __construct(
        string $id,
        Data\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Type $type,
        Collateral $collateral,
        RepaymentProcedure $repaymentProcedure,
        Data\Currency $currency,
        float $initialAmount,
        Data\SubjectRole $subjectRole,
        float $collateralCost,
        DealLife\Collection $dealLifes,
        ?string $inn = null,
        ?string $patronymic = null,
        ?string $source = null
    ) {
        parent::__construct([
            'id' => $id,
            'language' => $language,
            'name' => $name,
            'inn' => $inn,
            'patronymic' => $patronymic,
            'surname' => $surname,
            'birthDate' => $birthDate,
            'type' => $type,
            'collateral' => $collateral,
            'repaymentProcedure' => $repaymentProcedure,
            'currency' => $currency,
            'initialAmount' => $initialAmount,
            'subjectRole' => $subjectRole,
            'collateralCost' => $collateralCost,
            'dealLifes' => $dealLifes,
            'source' => $source
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'inn' => $this->inn,
            'language' => (string)$this->language,
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'type' => (string)$this->type,
            'collateral' => (string)$this->collateral,
            'repaymentProcedure' => (string)$this->repaymentProcedure,
            'currency' => (string)$this->currency,
            'initialAmount' => $this->initialAmount,
            'subjectRole' => (string)$this->subjectRole,
            'collateralCost' => $this->collateralCost,
            'dealLifes' => array_map(function (DealLife\Entity $dealLife): array {
                return $dealLife->jsonSerialize();
            }, $this->dealLifes->jsonSerialize()),
            'source' => $this->source
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): Data\Language
    {
        return $this->language;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getCollateral(): Collateral
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Data\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Data\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifes(): DealLife\Collection
    {
        return $this->dealLifes;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }
}
