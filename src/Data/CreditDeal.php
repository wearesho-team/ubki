<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static CreditDeal make(...$arguments)
 */
class CreditDeal implements Ubki\Contract\Data\CreditDeal, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var string */
    protected $id;

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Dictionary\CreditDeal */
    protected $type;

    /** @var Ubki\Dictionary\Collateral */
    protected $collateral;

    /** @var Ubki\Dictionary\RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var Ubki\Dictionary\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var Ubki\Dictionary\SubjectRole */
    protected $subjectRole;

    /** @var float */
    protected $collateralCost;

    /** @var Ubki\Data\Collection\DealLife */
    protected $dealLifes;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var string|null */
    protected $source;

    public function __construct(
        string $id,
        Ubki\Dictionary\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Dictionary\CreditDeal $type,
        Ubki\Dictionary\Collateral $collateral,
        Ubki\Dictionary\RepaymentProcedure $repaymentProcedure,
        Ubki\Dictionary\Currency $currency,
        float $initialAmount,
        Ubki\Dictionary\SubjectRole $subjectRole,
        float $collateralCost,
        Ubki\Data\Collection\DealLife $dealLifes,
        string $inn = \null,
        string $patronymic = \null,
        string $source = \null
    ) {
        Ubki\Validator::INN()->validate($inn, \true);
        Ubki\Validator::BIG_FLOAT()->validate((string)$initialAmount);

        $this->id = $id;
        $this->language = $language;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->type = $type;
        $this->collateral = $collateral;
        $this->repaymentProcedure = $repaymentProcedure;
        $this->currency = $currency;
        $this->initialAmount = $initialAmount;
        $this->subjectRole = $subjectRole;
        $this->collateralCost = $collateralCost;
        $this->dealLifes = $dealLifes;
        $this->inn = $inn;
        $this->patronymic = $patronymic;
        $this->source = $source;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'language' => $this->language,
            'name' => $this->name,
            'surname' => $this->surname,
            'birthDate' => Carbon::make($this->birthDate),
            'type' => $this->type,
            'collateral' => $this->collateral,
            'repaymentProcedure' => $this->repaymentProcedure,
            'currency' => $this->currency,
            'initialAmount' => $this->initialAmount,
            'subjectRole' => $this->subjectRole,
            'collateralCost' => $this->collateralCost,
            'dealLives' => $this->dealLifes,
            'inn' => $this->inn,
            'patronymic' => $this->patronymic,
            'source' => $this->source
        ];
    }

    public static function tag(): string
    {
        return 'crdeal';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getType(): Ubki\Dictionary\CreditDeal
    {
        return $this->type;
    }

    public function getCollateral(): Ubki\Dictionary\Collateral
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): Ubki\Dictionary\RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Ubki\Dictionary\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Ubki\Dictionary\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifes(): Ubki\Data\Collection\DealLife
    {
        return $this->dealLifes;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }
}
