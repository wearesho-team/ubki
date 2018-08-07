<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier\Legal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier\Legal
 *
 * @property-read string|null             $ergpou
 * @property-read int|null                $form
 * @property-read string|null             $economyBranch
 * @property-read string|null             $activityType
 * @property-read \DateTimeInterface|null $edrRegistrationDate
 * @property-read \DateTimeInterface|null $taxRegistrationDate
 */
class Entity extends Data\Credential\Identifier\Entity implements \JsonSerializable
{
    public const TAG = 'urident';

    public const ERGPOU = 'okpo';
    public const NAME = 'urname';
    public const FORM = 'urfrms';
    public const ECONOMY_BRANCH = 'ureconom';
    public const ACTIVITY_TYPE = 'urvide';
    public const EDR_REGISTRATION_DATE = 'urdatreg';
    public const TAX_REGISTRATION_DATE = 'urdatregnal';

    public function __construct(
        \DateTimeInterface $createdAt,
        Data\Language $language,
        string $name,
        ?string $ergpou = null,
        ?int $form = null,
        ?string $economyBranch = null,
        ?string $activityType = null,
        ?\DateTimeInterface $edrRegistrationDate = null,
        ?\DateTimeInterface $taxRegistrationDate = null
    ) {
        parent::__construct($createdAt, $language, $name, [
            'ergpou' => $ergpou,
            'form' => $form,
            'economyBranch' => $economyBranch,
            'activityType' => $activityType,
            'edrRegistrationDate' => $edrRegistrationDate,
            'taxRegistrationDate' => $taxRegistrationDate
        ]);
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'ergpou' => $this->ergpou,
                'form' => $this->form,
                'economyBranch' => $this->economyBranch,
                'activityType' => $this->activityType,
                'edrRegistrationDate' => Carbon::instance($this->edrRegistrationDate)->toDateString(),
                'taxRegistrationDate' => Carbon::instance($this->taxRegistrationDate)->toDateString()
            ]
        );
    }
}
