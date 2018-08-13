<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal
 *
 * @property-read string                              $id
 * @property-read Data\Language                       $language
 * @property-read string|null                         $inn
 * @property-read string                              $name
 * @property-read string|null                         $patronymic
 * @property-read string                              $surname
 * @property-read \DateTimeInterface                  $birthDate
 * @property-read Type                                $type
 * @property-read Collateral                          $collateral
 * @property-read RepaymentProcedure                  $repaymentProcedure
 * @property-read Data\Currency                       $currency
 * @property-read float                               $initialAmount
 * @property-read Data\SubjectRole                    $subjectRole
 * @property-read float                               $collateralCost
 * @property-read Data\CreditDeal\DealLife\Collection $dealLifes
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
    public const MIDDLE_NAME = 'fname';
    public const BIRTH_DATE = 'bdate';
    public const TYPE = 'dlcelcred';
    public const COLLATERAL = 'dlvidobes';
    public const REPAYMENT_PROCEDURE = 'dlporpog';
    public const CURRENCY = 'dlcurr';
    public const INITIAL_AMOUNT = 'dlamt';
    public const SUBJECT_ROLE = 'dlrolesub';
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
        Data\CreditDeal\DealLife\Collection $dealLifes,
        ?string $inn = null,
        ?string $patronymic = null
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
        ];
    }
}
