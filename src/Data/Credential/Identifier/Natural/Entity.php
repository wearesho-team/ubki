<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier\Natural;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier\Natural
 *
 * @property-read string|null               $inn
 * @property-read string|null               $middleName
 * @property-read string                    $lastName
 * @property-read \DateTimeInterface        $birthDate
 * @property-read Data\Gender               $gender
 * @property-read Data\FamilyStatus|null    $familyStatus
 * @property-read Data\Education            $education
 * @property-read Data\Nationality|null     $nationality
 * @property-read Data\RegistrationSpd|null $registrationSpd
 * @property-read Data\SocialStatus|null    $socialStatus
 * @property-read int|null                  $childrenCount
 */
class Entity extends Data\Credential\Identifier\Entity implements \JsonSerializable
{
    public const TAG = 'ident';

    public const INN = 'inn';
    public const NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
    public const LAST_NAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const GENDER = 'csex';
    public const FAMILY_STATUS = 'family';
    public const EDUCATION = 'ceduc';
    public const NATIONALITY = 'cgrag';
    public const REGISTRATION_SPD = 'spd';
    public const SOCIAL_STATUS = 'sstate';
    public const CHILDREN_COUNT = 'cchild';

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Data\Gender */
    protected $gender;

    /** @var Data\FamilyStatus|null */
    protected $familyStatus;

    /** @var Data\Education|null */
    protected $education;

    /** @var Data\Nationality|null */
    protected $nationality;

    /** @var Data\RegistrationSpd|null */
    protected $registrationSpd;

    /** @var Data\SocialStatus|null */
    protected $socialStatus;

    /** @var int|null */
    protected $childrenCount;

    public function __construct(
        \DateTimeInterface $createdAt,
        Data\Language $language,
        string $name,
        string $lastName,
        \DateTimeInterface $birthDate,
        Data\Gender $gender,
        ?string $inn = null,
        ?string $middleName = null,
        ?Data\FamilyStatus $familyStatus = null,
        ?Data\Education $education = null,
        ?Data\Nationality $nationality = null,
        ?Data\RegistrationSpd $registrationSpd = null,
        ?Data\SocialStatus $socialStatus = null,
        ?int $childrenCount = null
    ) {
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->inn = $inn;
        $this->middleName = $middleName;
        $this->familyStatus = $familyStatus;
        $this->education = $education;
        $this->nationality = $nationality;
        $this->registrationSpd = $registrationSpd;
        $this->socialStatus = $socialStatus;
        $this->childrenCount = $childrenCount;

        parent::__construct($createdAt, $language, $name);
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'lastName' => $this->lastName,
                'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
                'gender' => (string)$this->gender,
                'inn' => $this->inn,
                'middleName' => $this->middleName,
                'familyStatus' => (string)$this->familyStatus,
                'education' => (string)$this->education,
                'nationality' => (string)$this->nationality,
                'registrationSpd' => (string)$this->registrationSpd,
                'socialStatus' => (string)$this->socialStatus,
                'childrenCount' => $this->childrenCount,
            ]
        );
    }
}
